@extends('layouts.app')

@section('content')
    <h1>Add a Product</h1>
<form action="/products" method="POST">
    @csrf
    <div class="form-group">
        <div class="col-md-12">
        <label for="name">Product Name</label>
        <input type="text" name="product_name" id="product_name" placeholder="product Name" class="form-control">
        </div>
        <div class="col-md-12">
        <label for="name">Product Description</label>
        <input type="text" name="product_description" id="product_description" placeholder="product Description" class="form-control">
        </div>
        <div class="col-md-4">
        <label for="name">Category</label>

            <select class="custom-select" name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                @endforeach
            </select>
        </div>
    <input type="submit" value="Submit" class="btn btn-primary mt-2">
</form>
@endsection