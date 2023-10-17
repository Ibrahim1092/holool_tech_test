<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;
use App\Models\Order;
use App\Models\Product_order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Validator;
class CartController extends Controller
{
    public function store($id)
    {
        $product = Product::where('id',$id)->first();
        $cartdata = session()->get('cartdata',[]);
        if(isset($cartdata[$id]))
        {
            $cartdata[$id]['quantity']++;
            // return 'hello';
        }
        else
        {
            $cartdata[$id] = [
                'id' => $product->id,
                'name' => $product->name ,
                'description' => $product->description ,
                'price' => $product->price ,
                'images' => $product->images ,
                'quantity' => 1
            ];
        }
        session()->put('cartdata',$cartdata);
        // dd($cartdata);
        return redirect()->back()->with('Message','The Product has Been Added To The Card');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('user.cart');
    }
    public function  orderdetails($id)
    {
        $po = array();
        $porder = Product_order::where('order_id',$id)->get();
        foreach ($porder as $p)
        {
            $prouct_id = $p->product_id;
            $products = Product::where('id',$prouct_id)->first();
            $po[] =  $products;
            // $product = session()->get('product');
            // $product[$id] = [
            //     'product_name' =>  $products->name,
            //     'product_details' =>  $products->description,
            //     'product_price' =>  $products->price
            // ];
            // session()->put('product',$product);
            // session()->date_add('product',$product);
        }
        $order = Order::where('id',$id)->first();
        return view('admin.orderdetails',compact('order'))->with('po',$po);
    }
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::where('id',$id)->first();
        // $cartdata = session()->put('cartdata');
        $cartdata = session()->get('cartdata',[]);
        if (isset($cartdata[$id]))
        {
            $cartdata[$id] = [
                'id' => $product->id,
                'name' => $product->name ,
                'description' => $product->description ,
                'price' => $product->price ,
                'images' => $product->images ,
                'quantity' => $request->quantity
            ];
            session()->put('cartdata', $cartdata);
        }
        // if(($key = array_search($id,$cartdata)) !== false) {
        //     $cartdata[$key]['quantity'] = $request->quantity;
        // }
        // session()->put('cartdata', $cartdata);
        return redirect()->back()->with('Message','Updated Successfully');
    }
    public function storeorder(Request $request,$alltotal)
    {
        $validator = Validator::make($request->all(),[
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('/showcart')->with('Message','Error');
        }
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $alltotal
        ]);
        foreach($request->id as $id)
        {
            $porder = Product_order::create([
                'product_id' => $id,
                'order_id' => $order->id
            ]);
        }
        $cartdata = session()->pull('cartdata',[]);
        foreach($request->id as $id)
        {
            if(($key = array_search($id,$cartdata)) !== false) {
                unset($cartdata[$key]);
            }
        }
        return redirect()->route('/home')->With('Message','Done');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cartdata = session()->get('cartdata',[]);
        if (isset($cartdata[$id]))
        {
            unset($cartdata[$id]);
        }
        session()->put('cartdata', $cartdata);
        return redirect()->back()->with('Message','The Item has Been Deleted From Cart');
    }
    public function showorder()
    {
        $order = Order::all();
        return view('admin.show',compact('order'));
    }
}
