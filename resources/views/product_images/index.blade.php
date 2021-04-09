@extends('layouts.app')

@section('content')
    <h1>Products</h1>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Product Images</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
    {{-- @if (count($product_images) > 0) --}}
        @foreach ($product_images as $product)

      <tr>
      <th scope="row">{{$product->id}}</th>
        <td>
              <img src="{{ asset('storage/product/' .$product->product_image) }}" style="height:50px; width:80px"/>
        </td>
        <td>
            <a href="/product_images/{{$product->id}}/edit" class="btn btn-secondary float-left mr-1">Edit</a>
            <form action="/product_images/{{$product->id}}" method="post">
                @csrf
                <button class="btn btn-danger ">Delete</button>
                @method('DELETE')
            </form>
        </td>
      </tr>


            
        @endforeach
 
    {{-- @else
        <p>No Product found</p>
    @endif --}}
  <a href="/product_images/create" class="btn btn-secondary float-right mr-1">Create</a>


@endsection
</tbody>
</table>

