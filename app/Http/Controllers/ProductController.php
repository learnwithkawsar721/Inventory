<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use PhpParser\Node\Stmt\Echo_;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Product.index',[
            'count'=>Product::count(),
            'products'=>Product::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Product.create',[
            'category'=>Category::all(),
            'suppliers'=>Suppliers::all(),
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
            'product_name'=>'required|max:70',
            'product_code'=>"required|unique:products,product_code",
            'godaun'=>'required',
            'product_route'=>'required',
            'buy_day'=>'required',
            'expire_day'=>'required',
            'buy_price'=>'required',
            'selling_price'=>'required',
        ]);
        $product= Product::create($request->except('_token','product_img')+[
            'user_id'=>Auth::id()
        ]);
        if($request->hasFile('product_img')){
            $file_name = 'product-'.time().'.'.$request->file('product_img')->getClientOriginalExtension();
            Image::make($request->file('product_img'))->resize(550,370)->save(public_path('Uploades/product/'.$file_name),40);
            $product->update([
                'product_img'=>$file_name
            ]);
        }
        $notification = array(
                'message'=>'Product Inserted Successfully',
                'alert-type'=>'success',
            );
            return redirect(route('product.index'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('Admin.Product.show',[
            'product'=>$product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        return view('Admin.Product.edit',[
            'product'=>$product,
             'category'=>Category::all(),
             'suppliers'=>Suppliers::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name'=>'required|max:70',
            'product_code'=>"required|unique:products,product_code,$product->id",
            'godaun'=>'required',
            'product_route'=>'required',
            'buy_day'=>'required',
            'expire_day'=>'required',
            'buy_price'=>'required',
            'selling_price'=>'required',
        ]);
        $product->update($request->except('_token','_method','product_img'));
        if($request->hasFile('product_img')){
            if($product->product_img){
                unlink(public_path('Uploades/product/'.$product->product_img));
            }
            $file_name = 'product-'.time().'.'.$request->file('product_img')->getClientOriginalExtension();
            Image::make($request->file('product_img'))->resize(550,370)->save(public_path('Uploades/product/'.$file_name),40);
            $product->update([
                'product_img'=>$file_name
            ]);
        }
         $notification = array(
                'message'=>'Product Update Successfully',
                'alert-type'=>'success',
            );
            return redirect(route('product.index'))->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       $product = Product::where('id',$id)->first();
        unlink(public_path('Uploades/product/'.$product->product_img));
        $product->delete();
         $notification = array(
                'message'=>'Product Delete Successfully',
                'alert-type'=>'success',
            );
        return back()->with($notification);
    }
}
