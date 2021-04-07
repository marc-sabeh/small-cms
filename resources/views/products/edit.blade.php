@extends('layouts.app')

@section('content')
    <h1>Edit a Product</h1>
<form action="/products/{{$product->product_id}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group col-md-12">
        <label>Product Name</label>
    <input type="text" name="product_name" id="product_name" placeholder="Product Name" class="form-control" value="{{$product->product_name}}">
    </div>
    <div class="form-group col-md-12">
        <label>Product Description</label>
    <input type="text" name="product_description" id="product_description" placeholder="Product Description" class="form-control" value="{{$product->product_description}}">
    </div>
    <div class="form-group col-md-4">
        <label>Category Name</label>
        <select class="custom-select" name="category_id" id="category_id">
            @foreach ($categories as $category)
                <option @if($product->category_id=== $category->category_id) selected='selected' @endif value="{{$category->category_id}}">{{$category->category_name}}</option>
            @endforeach
        </select>
    </div>
    <input type="submit" value="Submit" class="btn btn-primary">
</form>
@endsection