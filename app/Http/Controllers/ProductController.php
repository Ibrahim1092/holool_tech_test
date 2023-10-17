<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.addproduct');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required',
            'images' => 'required',
            'price' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('Message','Fields must be filled out');
        }
        $image = array();
        if($file = $request->file('images')){
            foreach($file as $file)
            {
                $image_name = md5(rand(1000,10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $uploade_path = 'Products/Images/';
                $image_url = $uploade_path.$image_full_name;
                $file->move($uploade_path,$image_full_name);
                $image[] = $image_url;
            }
        }
        $product = Product::create([
            'name' => $request->name ,
            'description' => $request->description ,
            'images' => implode('|',$image),
            'price' => $request->price
        ]);
        return redirect()->route('product/show')->with('Message','THe Product has Been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product = Product::all();
        return view('user.show',compact('product'));
        // return view('user.cart');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product , $id)
    {
        $product = Product::where('id',$id)->first();
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required',
            'images' => 'required',
            'price' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('Message','Fields must be filled out');
        }
        $image = array();
        if($file = $request->file('images')){
            foreach($file as $file)
            {
                $image_name = md5(rand(1000,10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $uploade_path = 'Products/Images/';
                $image_url = $uploade_path.$image_full_name;
                $file->move($uploade_path,$image_full_name);
                $image[] = $image_url;
            }
        }
        $product = Product::where('id',$id)->update([
            'name' => $request->name ,
            'description' => $request->description ,
            'images' => implode('|',$image),
            'price' => $request->price
        ]);
        return redirect()->route('product/show')->with('Message','THe Product has Been Modified');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::where('id',$id)->delete();
        return redirect()->route('product/show')->with('Message','The Product has Been Deleted');
    }
}
