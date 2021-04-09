@extends('layouts.app')

@section('content')

    <h1>Add a Product Image</h1>
<form action="/product_images" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <div class="col-md-12">
          <label for="name">Product Id</label>
          <input type="text" name="product_id" id="product_id" placeholder="product Id" class="form-control" value="{{$product[0]->product_id}}" readonly>
          <label for="name">Product Image</label>
          <input type="file" name="file" id="file" placeholder="Product Image" class="form-control">
    <input type="submit" value="Submit" class="btn btn-primary mt-2">
        </div></div>
</form>
@endsection