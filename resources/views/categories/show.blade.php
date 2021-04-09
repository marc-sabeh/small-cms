@extends('layouts.app')

@section('content')
<h1>{{$category_name->category_name}}</h1>
<img width="200" height="150" src="{{ asset('storage/category/' . $category_name->category_image) }}" />
<br><br>
    <table class="table table-striped">
        <thead>
          <tr>
              
            <th scope="col">#</th>
            <th scope="col">Product</th>
            <th scope="col">Description</th>
  
          </tr>
        </thead>
        <tbody>
        @foreach ($categories_products as $categories_product)

      <tr>
      <th scope="row">{{$categories_product->product_id}}</th>
        <td>{{$categories_product->product_name}}</td>
        <td>{{$categories_product->product_description}}</td>
        @endforeach
      </tr>
    </tbody>
</table>
@endsection

