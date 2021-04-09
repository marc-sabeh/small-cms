@extends('layouts.app')

@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --}}
    <h1>Add a Product</h1>
<form action="/products" method="POST" enctype="multipart/form-data">
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
        <br>
        <h3 class="jumbotron"><i class="glyphicon glyphicon-upload"></i> Laravel Multiple File Upload</h3> 
        <div class="input-group control-group increment" >
            {{-- <input type="file" name="filename[]" class="form-control"> --}}
            <div class="input-group-btn"> 
              <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
            </div>
          </div>
          <div class="clone d-none">
            <div class="control-group input-group" style="margin-top:10px">
              <input type="file" name="filename[]" class="form-control">
              <div class="input-group-btn"> 
                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
              </div>
            </div>
          </div> 
    <input type="submit" value="Submit" class="btn btn-primary mt-2">
</form>

<script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>
@endsection