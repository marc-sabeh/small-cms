@extends('layouts.app')

@section('content')
    <h1>Add a Category</h1>
<form action="/categories" method="POST"  enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Category Id</label>
        <input type="text" name="category_id" id="category_id" placeholder="ID" class="form-control">
        <label for="name">Category Name</label>
        <input type="text" name="category_name" id="category_name" placeholder="Category Name" class="form-control">
        <label for="name">Category Image</label>
        <input type="file" name="file" id="file" placeholder="Category Image" class="form-control">
        <label for="name">Category Description</label>
        <input type="text" name="category_description" id="category_description" placeholder="Category Description" class="form-control">
    <input type="submit" value="Submit" class="btn btn-primary mt-2">
</form>
@endsection