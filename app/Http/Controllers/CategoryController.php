<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Category.index',[
            'count'=>Category::count(),
            'category'=>Category::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Category.create');
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
            'name'=>'required|unique:categories,name'
        ]);
        Category::create($request->except('_token')+['user_id'=>Auth::id()]);
          $notification = array(
                'message'=>"Category Added Successfully",
                'alert-type'=>'success',
            );
            return redirect(route('category.index'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Admin.Category.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Admin.Category.edit',[
            'category'=>Category::where('id',$id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'name'=>"required|unique:categories,name,$id"
        ]);
        $category = Category::where('id',$id)->first();
        $category->update($request->except('_token','_method'));
         $notification = array(
                'message'=>"Category Update Successfully",
                'alert-type'=>'success',
            );
            return redirect(route('category.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       $category = Category::where('id',$id)->first();
       $category->delete();
         $notification = array(
                'message'=>"Category Deleted Successfully",
                'alert-type'=>'success',
            );
            return back()->with($notification);
    }
}
