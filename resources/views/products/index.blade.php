@extends('layouts.app')

@section('content')
    <h1>Products</h1>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Products Description</th>
            <th scope="col">Category Name</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
    @if (count($products) > 0)
        @foreach ($products as $product)

      <tr>
      <th scope="row">{{$product->product_id}}</th>
        <td><a>{{$product->product_name}}</a></td>
        <td><a>{{$product->product_description}}</a></td>
        <td><a>{{$product->category_name}}</a></td>
        <td>
            <a href="/products/{{$product->product_id}}/edit" class="btn btn-secondary float-left mr-1">Edit</a>
            <form action="/products/{{$product->product_id}}" method="post">
                @csrf
                <button class="btn btn-danger ">Delete</button>
                @method('DELETE')
            </form>
        </td>
      </tr>


            
        @endforeach
 
    @else
        <p>No Product found</p>
    @endif
  <a href="/products/create" class="btn btn-secondary float-right mr-1">Create</a>


@endsection
</tbody>
</table>

