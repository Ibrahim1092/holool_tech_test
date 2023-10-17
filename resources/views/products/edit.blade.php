@extends('products.layout')
@section('content2')
<form action="{{route('product/update' , $product->id)}}" method="Post" style="padding-top: 10%" enctype="multipart/form-data">
    @csrf
    <h1>Edit Product</h1>
    <div class="formcontainer">
    <hr/>
    <div class="container">
      <label for="uname"><strong>Product Name</strong></label>
      <input type="text"  name="name" value="{{$product->name}}"" required>
      <label for="psw"><strong>Description</strong></label>
      <input type="text" name="description" value="{{$product->description}}" required><br>
      <label for="uname"><strong>Images</strong></label>
      <input type="file"  name="images[]" required multiple><br>
      <br>
      <label for="uname"><strong>Price</strong></label>
      <input type="text" name="price" value="{{$product->price}}" required>
    </div>
    <button type="submit">Update</button>
  </form>
