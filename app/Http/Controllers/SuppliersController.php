<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Http\Requests\SuppliersRequest;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Suppliers.index',[
            'suppliers'=>Suppliers::latest()->get(),
            'count'=>Suppliers::count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Suppliers.create');
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
            'phone'=>"required | unique:suppliers,phone",
            'address'=>'required',
            'city'=>'required',
            'shopname'=>'required',
            'photo'=>'image',
            'email'=>'email|unique:suppliers,email'
        ]);
          $suppliers = Suppliers::create($request->except('_token','photo')+[
            'user_id'=>Auth::id(),
        ]);
        if($request->hasFile('photo')){
            $file_name = 'suppliers-'.time().'.'.$request->file('photo')->getClientOriginalExtension();
            Image::make($request->file('photo'))->resize(150,150)->save(public_path('Uploades/suppliers/'.$file_name),40);
            $suppliers->update([
                'photo'=>$file_name,
            ]);
        }
        $notification = array(
                'message'=>'suppliers Inserted Successfully',
                'alert-type'=>'success',
        );
        return redirect(route('suppliers.index'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Admin.Suppliers.show',[
            'suppliers'=>Suppliers::where('id',$id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Admin.Suppliers.edit',[
            'suppliers'=>Suppliers::where('id',$id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $request->validate([
            'name'=>'required',
            'phone'=>"required | unique:suppliers,phone,$id",
            'address'=>'required',
            'city'=>'required',
            'shopname'=>'required',
            'photo'=>'image',
            'email'=>"email|unique:suppliers,email,$id"
        ]);
        $suppliers = Suppliers::where('id',$id)->first();
         $suppliers->update($request->except('_token','_method','photo'));
        if($request->hasFile('photo')){
            if($suppliers->photo){
                unlink(public_path('Uploades/suppliers/'.$suppliers->photo));
            }
            $file_name = 'suppliers-'.time().'.'.$request->file('photo')->getClientOriginalExtension();
            Image::make($request->file('photo'))->resize(150,150)->save(public_path('Uploades/suppliers/'.$file_name),40);
            $suppliers->update([
                'photo'=>$file_name,
            ]);
        }
          $notification = array(
                'message'=>'suppliers Updated Successfully',
                'alert-type'=>'success',
            );
            return redirect(route('suppliers.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $suppliers = Suppliers::where('id',$id)->first();
        unlink(public_path('Uploades/suppliers/'.$suppliers->photo));
        $suppliers->delete();
         $notification = array(
                'message'=>'Suppliers Delete Successfully',
                'alert-type'=>'success',
            );
        return back()->with($notification);
    }
}
