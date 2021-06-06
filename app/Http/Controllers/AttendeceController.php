<?php

namespace App\Http\Controllers;

use App\Models\Attendece;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendeceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Attendece.index',[
            'attendece'=>Attendece::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Admin.Attendece.create',[
            'employee'=>Employee::all()
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
       if(Attendece::where('date',$request->date)->exists()){
            $notification = array(
                'message'=>'ToDay Attendeces Alrady Exists',
                'alert-type'=>'error',
            );
          return back()->with($notification);
       }else{
          foreach($request->attendece as $key=> $value){
              Attendece::create([
                  'user_id'=>$key,
                  'date'=>$request->date,
                  'month'=>$request->month,
                  'year'=>$request->year,
                  'attendece'=>$value,
              ]);

          }
            $notification = array(
                'message'=>'ToDay Attendeces Successfully',
                'alert-type'=>'success',
            );
          return back()->with($notification);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendece  $attendece
     * @return \Illuminate\Http\Response
     */
    public function show(Attendece $attendece)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendece  $attendece
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendece $attendece)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendece  $attendece
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendece $attendece)
    {
        $attendece->update($request->except('_token','_method'));
         $notification = array(
                'message'=>'Attendeces Update Successfully',
                'alert-type'=>'success',
            );
          return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendece  $attendece
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendece $attendece)
    {
        //
    }
}
