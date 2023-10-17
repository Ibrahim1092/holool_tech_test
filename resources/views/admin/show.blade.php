@extends('products.layout')
@section('content2')
<div class="container" style="padding-top: 10%">
    <div class="container text-center">
        <div class="row row-cols-1">
            {{-- <div class="col" style="padding-left: 2%"><a href="{{route('product/create')}}" class="">Orders</a></div> --}}
            <div class="col" > <h1 style="font-family: 'Courier New', Courier, monospace" > Orders </h1> </div>
          <div class="col" style="padding-top: 5%">
            <table class="table" style="overflow-x:auto;}">
                <thead>
                  <tr>
                    {{-- <th style="text-align: right"  scope="col"></th> --}}
                    <th style="text-align: center" scope="col">ID</th>
                    <th style="text-align: center" scope="col">User_id</th>
                    <th style="text-align: center" scope="col">User_name</th>
                    <th style="text-align: center" scope="col">Total_Price</th>
                    {{-- <th style="text-align: center" scope="col">price</th> --}}
                    <th style="text-align: center" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($order as $item)
                    <tr>
                        <td style="text-align: center" class="pd2" scope="row">{{$item->id}}</td>
                        <td style="text-align: center">{{$item->user->id}}</td>
                        <td style="text-align: center">{{$item->user->name}}</td>
                        <td style="text-align: center" >{{$item->total_price}}</td>
                        <td style="text-align: center" ><a class="btn btn-success" href="{{route('/admin/orderdetails' , $item->id)}}">Show</a></td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
          </div>
        </div>
      </div>
</div>

