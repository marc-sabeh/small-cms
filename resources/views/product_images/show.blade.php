@extends('layouts.app')

@section('content')

<h1>{{$product[0]->product_id}}</h1>
<a href="/product_images/create/{{$product[0]->product_id}}" class="btn btn-secondary float-right mr-1">Create</a>

{{-- <img width="200" height="150" src="{{ asset('storage/category/' . $category_name->category_image) }}" /> --}}
<br><br>
    <table class="table table-striped">
        <thead>
          <tr>
              
            <th scope="col">#</th>
            <th scope="col">Image</th>
          </tr>
        </thead>
        <tbody>
        @if (count($product_images) > 0)
        @foreach ($product_images as $image)

      <tr>
      <th scope="row">{{$image->id}}</th>
      <th scope="row">
      <img src="{{ asset('storage/products/' .$image->product_image) }}" style="height:50px; width:80px"/>
    </th>
    <td>
      <form action="/product_images/show/{{$image->id}}" method="post">
          @csrf
          <button class="btn btn-danger ">Delete</button>
          @method('DELETE')
      </form>
    </td>
        @endforeach
        @else
          <p>No Images found</p>
        @endif
      </tr>
    </tbody>
</table>
@endsection

