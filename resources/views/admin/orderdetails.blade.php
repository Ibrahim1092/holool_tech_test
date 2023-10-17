@extends('products.layout')
@section('content2')
<div class="container" style="padding-top: 10%">
    <div class="container text-center">
        <div class="row row-cols-1">
            {{-- <div class="col" style="padding-left: 2%"><a href="{{route('product/create')}}" class="">Orders</a></div> --}}
            <div class="col" > <h1 style="font-family: 'Courier New', Courier, monospace" > Product Details </h1> </div>
          <div class="col" style="padding-top: 5%">
            <table class="table" style="overflow-x:auto;}">
                <thead>
                  <tr>
                    {{-- <th style="text-align: right"  scope="col"></th> --}}
                    {{-- <th style="text-align: center" scope="col">ID</th> --}}
                    <th style="text-align: center" scope="col">Product_Name</th>
                    <th style="text-align: center" scope="col">Product_Details</th>
                    <th style="text-align: center" scope="col">Product_Price</th>
                    {{-- <th style="text-align: center" scope="col">Product_price</th> --}}
                    {{-- <th style="text-align: center" scope="col">Total_Price</th> --}}
                    {{-- <th style="text-align: center" scope="col">price</th> --}}
                    {{-- <th style="text-align: center" scope="col">Action</th> --}}
                  </tr>
                </thead>
                <tbody>
                    {{-- @if(session()->has('product')) --}}
                    {{-- @if($message = session()->get('product')) --}}
                    @foreach ($po as $item)
                    <tr>
                        <td style="text-align: center" scope="row">{{$item->name}}</td>
                        <td style="text-align: center">{{$item->details}}</td>
                        <td style="text-align: center">{{$item->price}}</td>
                    </tr>
                    @endforeach

                    {{-- @endif --}}
                    {{-- @endif --}}
                    {{-- {{session()->forget('product')}} --}}
                </tbody>
              </table>
          </div>
        </div>
      </div>
</div>

