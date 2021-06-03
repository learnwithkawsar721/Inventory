<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Customer.index',[
            'customeers'=>Customer::latest()->get(),
            'count'=>Customer::count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'city'=>'required',
            'address'=>'required',
            'photo'=>'image',
            'email'=>'email|unique:customers',
        ]);
        $customer = Customer::create($request->except('_token','photo')+[
            'user_id'=>Auth::id(),
        ]);
        if($request->hasFile('photo')){
            $file_name = 'customer-'.time().'.'.$request->file('photo')->getClientOriginalExtension();
            Image::make($request->file('photo'))->resize(150,150)->save(public_path('Uploades/customer/'.$file_name),40);
            $customer->update([
                'photo'=>$file_name,
            ]);
        }
        $notification = array(
                'message'=>'Customer Inserted Successfully',
                'alert-type'=>'success',
        );
        return redirect(route('customer.index'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('Admin.Customer.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('Admin.Customer.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function delete(Customer $customer)
    {
        //
    }
}
