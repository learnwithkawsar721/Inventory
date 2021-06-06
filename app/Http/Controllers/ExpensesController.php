<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Admin.Expense.index',[
            'expenses'=>Expenses::all(),
            'total'=>Expenses::all()->sum('amount'),
        ]);
    }

    // today_expenses Show

    public function today_expenses(){

        return view('Admin.Expense.today',[
            'today'=>Expenses::where('date',date('Y-m-d'))->get(),
        ]);
    }

    //search_expenses
    public function search_expenses(Request $request){

        // return view('Admin.Expense.search');

         return view('Admin.Expense.search',[
            'month'=>Expenses::where('date',$request->date)->get(),
            'months'=>$request->date,
            'years'=>$request->year,
            'date'=>$request->date,
            'month_amount'=>Expenses::where('date',$request->date)->sum('amount'),
            'year'=>Expenses::where('year',$request->year)->get(),
            'year_amount'=>Expenses::where('year',$request->year)->sum('amount'),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Expense.create');
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
            'details'=>'required',
            'amount'=>'required',
        ]);
        Expenses::create($request->except('_token'));
        $notification = array(
                'message'=>'Expenses Inserted Successfully',
                'alert-type'=>'success',
            );
            return redirect(route('expenses.index'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('Admin.Expense.show',[
            'expenses'=>Expenses::where('id',$id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('Admin.Expense.edit',[
            'expenses'=>Expenses::where('id',$id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'details'=>'required',
            'amount'=>'required',
        ]);
        $expenses =Expenses::where('id',$id)->first();
        $expenses->update($request->except('_token','_method'));
         $notification = array(
                'message'=>'Expenses Update Successfully',
                'alert-type'=>'success',
            );
            return redirect(route('expenses.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Expenses::where('id',$id)->delete();
         $notification = array(
                'message'=>'Expenses Delete Successfully',
                'alert-type'=>'success',
            );
            return back()->with($notification);
    }
}
