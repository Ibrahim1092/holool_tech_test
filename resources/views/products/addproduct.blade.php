@extends('products.layout')
@section('content2')
<form action="{{route('product/store')}}" method="Post" style="padding-top: 10%" enctype="multipart/form-data">
    @csrf
    <h1>Add Product</h1>
    <div class="formcontainer">
    <hr/>
    <div class="container">
      <label for="uname"><strong>Product Name</strong></label>
      <input type="text"  name="name" required>
      <label for="psw"><strong>Description</strong></label>
      <input type="text" name="description" required><br>
      <label for="uname"><strong>Images</strong></label>
      <input type="file"  name="images[]" required multiple><br>
      <br>
      <label for="uname"><strong>Price</strong></label>
      <input type="text" name="price" required>
    </div>
    <button type="submit">Submit</button>
  </form>
