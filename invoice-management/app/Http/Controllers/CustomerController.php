<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Currency;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['currencies']=Currency::all();
        $data['countries']=Country::all();
          return view('customer.add-customer',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        return response()->json($customer);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addCustomer (Request $request)
    {

        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'email' => 'required|email|unique:users',
            'contact_person' => 'required',
            'currency' => 'required',
            'country' => 'required',
            'phone_number' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->with('error', [$validator->errors()])->withInput();
        }


        try
        {

            $customer =new Customer();
            $customer->company_name=$request->company_name;
            $customer->contact_person=$request->contact_person;
            $customer->email=$request->email;
            $customer->currency=$request->currency;
            $customer->phone=$request->phone_number;
            $customer->country=$request->country;
            $customer->full_address=$request->full_address;
            $customer->join_date=date('Y-m-d');
            $customer->create_by=Auth::user()->id;
            $customer->full_address=$request->full_address;
            $customer->save();

            Alert::success('Customer Created', 'Customer created Successfully');

            return redirect()->route('manage.customer');


        }catch (\Exception $e) {
           // Handle the exception
            return redirect()->back()->with('error', 'Failed to create Customer. ' . $e->getMessage())->withInput();;
        }

    }

    /**
     * Display the specified resource.
     */
    public function manageCustomer()
    {
          $data['customers']=Customer::all();
          return view('customer.manage-customer',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        $currencies=Currency::all();
        $countries=Country::all();

        return view('customer.edit-customer', ['customer' => $customer,'currencies'=>$currencies,'countries'=>$countries]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $customer=Customer::find($id);
        try
        {

            $customer->company_name=$request->company_name;
            $customer->contact_person=$request->contact_person;
            $customer->email=$request->email;
            $customer->currency=$request->currency;
            $customer->phone=$request->phone_number;
            $customer->country=$request->country;
            $customer->full_address=$request->full_address;
            $customer->join_date=date('Y-m-d');
            $customer->create_by=Auth::user()->id;
            $customer->full_address=$request->full_address;
            $customer->save();

            Alert::success('Customer Updated', 'Customer updated Successfully');

        return redirect()->route('manage.customer');

        } catch (\Exception $e) {
           // Handle the exception
            return redirect()->back()->with('error', 'Failed to update Customer. ' . $e->getMessage())->withInput();;
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
