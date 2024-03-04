<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\ProjectReport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (auth()->check()) {
          return redirect()->route('dashboard');
        }
       return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

       $user_detail= User::where('email',$request->name)->orWhere('user_name',$request->name)->first();
       if(!empty($user_detail))
       {
            $input=[
                        'email' => $user_detail->email,
                        'password' => $request->password,
                    ];
                    $credentials = $input;
                    if (Auth::attempt($credentials)) {
                        return redirect()->intended('dashboard')
                            ->withSuccess('Signed in');
                    }else{
        return redirect()->route('login')->with('error', 'Incorrect password')->withInput();


                    }
       }else{
        return redirect()->route('login')->with('error', 'Login details are not valid')->withInput();

       }


    }


    /**
     * Show the form for creating a new resource.
     */
    public function addUser(Request $request)
    {
    //    return  $request->all();

        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'phone_number' => 'required',
            'user_name' => 'required|unique:users',
        ]);


        if ($validator->fails()) {

            return redirect()->back()->with('error', [$validator->errors()])->withInput();

        }


        $userAccess = $request->input('user_access', []);

         // Initialize keys to 0
        $projectKey = '0';
        $userKey = '0';
        $invoiceKey = '0';

       // Check if user_access array contains "project"
        if (in_array('project', $userAccess)) {
            $projectKey = '1';
        }

        // Check if user_access array contains "user"
        if (in_array('user', $userAccess)) {
            $userKey = '1';
        }

         if (in_array('invoice', $userAccess)) {
            $invoiceKey = '1';
        }





         try
        {
        $user =new User();
        $user->full_name=$request->full_name;
        $user->phone=$request->phone_number;
        $user->user_name=$request->user_name;
        $user->password=Hash::make($request->password);
        $user->email=$request->email;
        $user->project = $projectKey;
        $user->customer = $userKey;
        $user->invoice = $invoiceKey;
        $user->access=$request->access;
        $user->status='active';
        $user->save();

       Alert::success('User Created', 'User created Successfully');

        return redirect()->route('manage.user');

        } catch (\Exception $e) {
           // Handle the exception
            return redirect()->back()->with('error', 'Failed to create user. ' . $e->getMessage())->withInput();;
        }
    }

    public function manageUser()
    {
       $data['users']= User::all();
        return view('user.manage-user',$data);
    }
    public function dashboard()
    {

        $data['project_count']=Project::get()->count();
        $data['invoice_count']=ProjectReport::get()->count();
        $data['customer_count']=Customer::get()->count();
        $data['projects']=Project::paginate(10);
        $data['customers']=Customer::paginate(10);
        return view('index',$data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $user = User::find($id);
        return view('user.edit-user', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

         $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'email' => [
                            'required',
                            'email',
                            Rule::unique('users')->ignore($id),
                        ],
            'password' => 'required',
            'phone_number' => 'required',
            'user_name' => 'required|unique:users',
        ]);


        if ($validator->fails()) {

            return redirect()->back()->with('error', [$validator->errors()])->withInput();

        }


        $user=User::find($id);

         $userAccess = $request->input('user_access', []);

         // Initialize keys to 0
        $projectKey = '0';
        $userKey = '0';
        $invoiceKey = '0';

       // Check if user_access array contains "project"
        if (in_array('project', $userAccess)) {
            $projectKey = '1';
        }

        // Check if user_access array contains "user"
        if (in_array('user', $userAccess)) {
            $userKey = '1';
        }

         if (in_array('invoice', $userAccess)) {
            $invoiceKey = '1';
        }



         try
        {
        $user->full_name=$request->full_name;
        $user->phone=$request->phone_number;
        $user->user_name=$request->user_name;

         if(!empty($request->password))
        {
            $user->password=Hash::make($request->password);
        }

        $user->email=$request->email;
        $user->project = $projectKey;
        $user->customer = $userKey;
        $user->invoice = $invoiceKey;
        $user->access=$request->access;
        $user->status='active';
        $user->save();

       Alert::success('User Updated', 'User updated Successfully');


        return redirect()->route('manage.user');

        } catch (\Exception $e) {
           // Handle the exception
            return redirect()->back()->with('error', 'Failed to update user. ' . $e->getMessage())->withInput();;
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }


    public function logout()
    {

               Auth::logout();
               Alert::success('Logout', 'Logout Successfully');
               return redirect()->route('login');

    }

    public function setting()
    {
        $user = User::find(Auth::user()->id);
        return view('setting', ['user' => $user]);
    }


    public function update_profile(Request $request)
    {

        $user= User::find(Auth::user()->id);

        $user->full_name=$request->full_name;
        $user->phone=$request->phone_number;
        $user->user_name=$request->user_name;
        $user->email=$request->email;

        if($request->file('image'))
        {
              $image = $request->file('image');

            // Generate a unique name for the file
            $imageName = time().'.'.$image->extension();

        // Move the uploaded file to the storage directory
        $image->move(public_path('images'), $imageName);

        $user->profile_img=$imageName;
        }

        if(!empty($request->password))
        {
             $user->password=Hash::make($request->password);
        }

        $user->save();


       Alert::success('Profile Updated', 'User profile updated Successfully');
       return redirect()->back();
    }
}
