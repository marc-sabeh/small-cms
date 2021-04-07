@extends('layouts.app')

@section('content')
    <h1>Edit a Category</h1>
<form action="/categories/{{$category->category_id}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="category_id">category Id</label>
    <input type="text" name="category_id" id="category_id" placeholder="ID" class="form-control" value="{{$category->category_id}}">
    </div>
    <div class="form-group">
        <label for="email">Category Name</label>
    <input type="text" name="category_name" id="category_name" placeholder="Category Name" class="form-control" value="{{$category->category_name}}">
    </div>
    <div class="form-group">
        <label for="email">Category Description</label>
    <input type="text" name="category_description" id="category_description" placeholder="Category Description" class="form-control" value="{{$category->category_description}}">
    </div>
    
    <input type="submit" value="Submit" class="btn btn-primary">
</form>
@endsection