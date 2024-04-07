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
            <form action="{{route('store.product')}}" method="post" class="form" enctype="multipart/form-data">
                @csrf
                <h1>Add Product Form</h1>
                <hr class="hr">
                <div class="form-group">
                    <label for="" class="control-label">Sub Category Name</label>
                    <select name="category_id" id="" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <label class="alert alert-danger">{{$message}}</label>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Product Name</label>
                    <input type="text" name="name" class="form-control">
                    @error('name')
                        <label class="alert alert-danger">{{$message}}</label>
                    @enderror
                </div>
                <div class="form group">
                    <label for="" class="control-label">Price</label>
                    <input type="number" step="any" name="price" class="form-control">
                    @error('price')
                        <label class="alert alert-danger">{{$message}}</label>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="control-form">images</label>
                    <input type="file" name="image" class="form-control" value="choose">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-large btn-primary">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection