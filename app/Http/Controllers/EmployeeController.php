<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeesRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Admin.Employee.index',[
            'employees'=>Employee::latest()->get(),
            'emplotyee_count'=>Employee::count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeesRequest $request)
    {
        $employee = Employee::create($request->except('_token','photo')+[
            'user_id'=>Auth::id(),
        ]);
        if($request->hasFile('photo')){
            $file_name = 'employee-'.time().'.'.$request->file('photo')->getClientOriginalExtension();
            Image::make($request->file('photo'))->resize(150,150)->save(public_path('Uploades/employees/'.$file_name),40);
            $employee->update([
                'photo'=>$file_name,
            ]);
        }
        if($employee){
             $notification = array(
                'message'=>'Employe Inserted Successfully',
                'alert-type'=>'success',
            );
            return redirect(route('employe.index'))->with($notification);
        }else{
             $notification = array(
                'message'=>'Opps!! Error',
                'alert-type'=>'error',
            );
            return back()->with($notification);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('Admin.Employee.show',[
            'employe'=>Employee::where('id',$id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('Admin.Employee.edit',[
            'employee'=>Employee::where('id',$id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeesRequest $request, $id)
    {
        $employee = Employee::where('id',$id)->first();
         $employee->update($request->except('_token','_method','photo'));
        if($request->hasFile('photo')){
            if($employee->photo){
                unlink(public_path('Uploades/employees/'.$employee->photo));
            }
            $file_name = 'employee-'.time().'.'.$request->file('photo')->getClientOriginalExtension();
            Image::make($request->file('photo'))->resize(150,150)->save(public_path('Uploades/employees/'.$file_name),40);
            $employee->update([
                'photo'=>$file_name,
            ]);
        }
          $notification = array(
                'message'=>'Employe Updated Successfully',
                'alert-type'=>'success',
            );
            return redirect(route('employe.index'))->with($notification);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $employee = Employee::where('id',$id)->first();
        unlink(public_path('Uploades/employees/'.$employee->photo));
        $employee->delete();
         $notification = array(
                'message'=>'Employe Delete Successfully',
                'alert-type'=>'success',
            );
        return back()->with($notification);
    }
}
