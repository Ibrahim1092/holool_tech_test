@extends('products.layout')
@section('content2')
<div class="container" style="padding-top: 10%">
    <div class="container text-center">
        @if ($message = Session::get('Message'))
        <div class="alert2">
            <span class="closebtn2" onclick="this.parentElement.style.display='none';">&times;</span>
            {{$message}}
        </div>
        @endif
        <div class="row row-cols-1">
            <div class="col" style="padding-left: 2%"><a href="{{route('product/create')}}" class="button" style="border-radius: 2px" action="#">Add Product</a></div>
          <div class="col" style="padding-top: 5%">
            <table class="table" style="overflow-x:auto;}">
                <thead>
                  <tr>
                    <th style="text-align: right"  scope="col"></th>
                    <th style="text-align: right; padding-right:0%" class="pd2" scope="col">ID</th>
                    <th style="text-align: center" scope="col">Name</th>
                    <th style="text-align: center" scope="col">Description</th>
                    <th style="text-align: center" scope="col">Images</th>
                    <th style="text-align: center" scope="col">price</th>
                    <th style="text-align: center" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($product as $item)
                    @php
                    $images = explode('|',$item->images);
                    @endphp
                    <tr>
                        <td> </td>
                        <td style="text-align: right" class="pd2" scope="row">{{$item->id}}</th>
                        <td style="text-align: center">{{$item->name}}</td>
                        <td style="text-align: center">{{$item->description}}</td>
                        <td style="text-align: center">
                            {{-- <div class="container text-center"> --}}
                                <div class="row row-col-2">
                                    @foreach ($images as $img)
                                    <div class="col pad" > <img class="avatar" src="{{asset($img)}}" /></div>
                                    @endforeach
                                </div>
                              {{-- </div> --}}
                        </td>
                        <td style="text-align: center" >{{$item->price}}</td>
                        <td>
                            {{-- <div class="container text-center"> --}}
                                <div class="row row-col-2">
                                  <div class="col" style="padding-top: 2%">
                                    <a class="btn btn-warning" href="{{route('product/edit',$item->id)}}">Edit</a>
                                  </div>
                                  <div class="col pad" >
                                    <form action="{{route('product/delete' , $item->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button style="padding-top: 1%" class = "btn btn-danger" type="submit">Delete</button>
                                    </form>
                                    {{-- <a class="btn btn-danger"  href="{{route('product/delete',$item->id)}}">Delete</a> --}}
                                  </div>
                                </div>
                              {{-- </div> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
          </div>
        </div>
      </div>
</div>

