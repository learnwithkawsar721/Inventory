<?php

namespace App\Http\Controllers;

use App\Models\AdvancedSalary;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Salary.index',[
            'salary'=>AdvancedSalary::latest()->get()
        ]);
    }

    //show Pay Salary
    public function pay_salary(){
        return view('Admin.Salary.pay',[
            'employee'=>Employee::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Salary.create',[
            'employees'=>Employee::all(),
        ]);
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
            'advanced_salary'=>'required',
            'year'=>'required',
        ]);
        if(AdvancedSalary::where('emp_id',$request->emp_id)->where('month',$request->month)->exists()){
              $notification = array(
                'message'=>"Advanced Salary Add This Month",
                'alert-type'=>'error',
            );
            return back()->with($notification);
        }else{

            AdvancedSalary::create($request->except('_token'));
            $notification = array(
                'message'=>"Advanced Salary Add Successfully",
                'alert-type'=>'success',
            );
            return redirect(route('salary.index'))->with($notification);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(AdvancedSalary $salary)
    {
        return view('Admin.Salary.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit(AdvancedSalary $salary)
    {
        return view('Admin.Salary.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdvancedSalary $salary)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdvancedSalary $salary)
    {
        //
    }
}
