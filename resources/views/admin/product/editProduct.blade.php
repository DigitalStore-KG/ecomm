@extends('admin.layout.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
          
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{session()->get('message')}}
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{session()->get('error')}}
                </div> 
            @endif
            
            <form action="{{route('update.product',$product->id)}}" method="post" class="form" enctype="multipart/form-data">
                @csrf
                @method('put');
                <h1>Add Product Form</h1>
                <hr class="hr">
                <div class="form-group">
                    <label for="" class="control-label">Sub Category Name</label>
                    <select name="category_id" id="" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" @if ($category->id==$product->category_id) selected @endif >{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <label class="alert alert-danger">{{$message}}</label>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Product Name</label>
                    <input type="text" name="name" class="form-control" value="{{$product->name}}">
                    @error('name')
                        <label class="alert alert-danger">{{$message}}</label>
                    @enderror
                </div>
                <div class="form group">
                    <label for="" class="control-label">Price</label>
                    <input type="number" step="any" name="price" class="form-control" value="{{$product->price}}">
                    @error('price')
                        <label class="alert alert-danger">{{$message}}</label>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="control-form">images</label>
                    <input type="file" name="image" class="form-control" value="choose">
                </div>
                <div class="form-group" style="text-align:center" >
                    <img style="width: 80px;" src="{{asset('uploads/products/'.$product->image)}}" alt="" srcset="">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-large btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection