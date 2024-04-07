@extends('admin.layout.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6"> 
            <form action="{{route('update.category',$category->id)}}" class="form" method="post">
                @csrf
                <h1>Form to add Category</h1>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session()->get('message')}}
                    </div>
                    
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{session()->get('error')}}
                    </div>
                @endif
                <div class="form-group">
                    <label for="" class="control-label">Category Name</label>
                    <input type="text" name="name" class="form-control" value="{{$category->name}}">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Sub category of</label>
                    <div>
                        <select name="category_id" id="" class="form-control">
                            <option value=""@if ($category->category_id==null) selected @endif >no subcategory</option>
                        @foreach ($categories as $categorie)
                            <option value="{{$categorie->id}}"@if ($category->category_id!=null && $category->category_id==$categorie->id)
                                selected
                            @endif >{{$categorie->name}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">ADD</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection