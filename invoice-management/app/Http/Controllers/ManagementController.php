<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Currency;
use App\Models\Department;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ManagementController extends Controller
{
    public function manage_currency()
    {
         $data['currencies']=Currency::all();
         return view('management.currency',$data);
    }

     public function manage_country()
    {
         $data['countries']=Country::all();
         return view('management.country',$data);
    }


    public function store_country(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'icon' => 'required|unique:countries',
        ]);

         if ($validator->fails()) {
            return redirect()->back()->with('error', [$validator->errors()])->withInput();
        }

          try
        {
                $country=new Country();
                $country->name=$request->name;
                $country->icon=$request->icon;
                $country->save();

            Alert::success('Country Created', 'Country created Successfully');

            return redirect()->route('manage.country');


        }catch (\Exception $e) {
           // Handle the exception
            return redirect()->back()->with('error', 'Failed to create Country. ' . $e->getMessage())->withInput();
        }

    }

    public function store_currency(Request $request)
    {

         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'symbol' => 'required|unique:currencies',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->with('error', [$validator->errors()])->withInput();
        }

          try
        {
        $currency=new Currency();
        $currency->name=$request->name;
        $currency->symbol=$request->symbol;
        $currency->save();

            Alert::success('Currency Created', 'Currency created Successfully');

            return redirect()->route('manage.currency');


        }catch (\Exception $e) {
           // Handle the exception
            return redirect()->back()->with('error', 'Failed to create Currency. ' . $e->getMessage())->withInput();
        }



    }

    public function currency_edit(Request $request,$id)
    {
        $data['currency']=Currency::find($id);
         return view('management.edit_currency',$data);
    }

       public function country_edit(Request $request,$id)
    {
        $data['country']=Country::find($id);
         return view('management.edit_country',$data);
    }





    public function update_currency(Request $request,$id)
    {

        $currency=Currency::find($id);
        $currency->name=$request->name;
        $currency->symbol=$request->symbol;
        $currency->save();

           Alert::success('Currency Updated', 'Currency updated Successfully');

            return redirect()->route('manage.currency');

    }

    public function update_country(Request $request,$id)
    {

        $country=Country::find($id);
        $country->name=$request->name;
        $country->icon=$request->icon;
        $country->save();

           Alert::success('Country Updated', 'Country updated Successfully');

            return redirect()->route('manage.country');

    }

    public function manage_department()
    {

           $data['departments']=Department::all();
         return view('management.manage_department',$data);
    }

    public function add_department(Request $request)
    {

       if ($request->isMethod('post')) {
           $department=new Department();
           $department->department_name=$request->department_name;
           $department->name=$request->name;
           $department->phone=$request->phone;
           $department->email=$request->email;
           $department->website=$request->website;
           $department->acc_holder_name=$request->acc_holder_name;
           $department->acc_number=$request->acc_number;
           $department->bank_name=$request->bank_name;
           $department->ifsc=$request->ifsc;
           $department->gstin=$request->gstin;
           $department->swift_code=$request->swift_code;
           $department->address=$request->address;

            if($request->file('image'))
            {
                $image = $request->file('image');

                // Generate a unique name for the file
                $imageName = time().'.'.$image->extension();

            // Move the uploaded file to the storage directory
            $image->move(public_path('images'), $imageName);

            $department->image=$imageName;
            }


           $department->save();

           Alert::success('Department Added', 'Department added Successfully');

            return redirect()->route('manage.department');

       }else{

           return view('management.add_department');
       }


    }

    public function department_edit($id)
    {
           $data['department']=Department::find($id);

           return view('management.edit_department',$data);
    }

    public function update_department(Request $request,$id)
    {

         $department=Department::find($id);
           $department->department_name=$request->department_name;
           $department->name=$request->name;
           $department->phone=$request->phone;
           $department->email=$request->email;
           $department->website=$request->website;
           $department->acc_holder_name=$request->acc_holder_name;
           $department->acc_number=$request->acc_number;
           $department->bank_name=$request->bank_name;
           $department->ifsc=$request->ifsc;
           $department->gstin=$request->gstin;
           $department->swift_code=$request->swift_code;
           $department->address=$request->address;

            if($request->file('image'))
            {
                $image = $request->file('image');

                // Generate a unique name for the file
                $imageName = time().'.'.$image->extension();

            // Move the uploaded file to the storage directory
            $image->move(public_path('images'), $imageName);

            $department->image=$imageName;
            }


           $department->save();

           Alert::success('Department Updated', 'Department updated Successfully');

            return redirect()->route('manage.department');


    }


}
