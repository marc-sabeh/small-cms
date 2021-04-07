@extends('layouts.app')

@section('content')
    <h1>Categories</h1>
    <a href="/products" class="btn btn-secondary  mr-1">Add Products</a>
    <br>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Category Name</th>
            <th scope="col">Category Description</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
    @if (count($categories) > 0)
        @foreach ($categories as $category)

      <tr>
      <th scope="row">{{$category->category_id}}</th>
        <td><a href="/categories/{{$category->category_id}}">{{$category->category_name}}</a></td>
        <td><a href="/categories/{{$category->category_id}}">{{$category->category_description}}</a></td>
        <td>
            <a href="/categories/{{$category->category_id}}/edit" class="btn btn-secondary float-left mr-1">Edit</a>
            <form action="/categories/{{$category->category_id}}" method="post">
                @csrf
                <button class="btn btn-danger ">Delete</button>
                @method('DELETE')
            </form>
        </td>
      </tr>


            
        @endforeach
 
    @else
        <p>No category found</p>
    @endif
  <a href="/categories/create" class="btn btn-secondary float-right mr-1">Create</a>


@endsection
</tbody>
</table>

