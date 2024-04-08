@extends('admin.layout.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6"> 
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session()->get('message')}}
                </div>
                
            @endif
            @if(session()->has('error'))
                <div class="alert alert-success">
                    {{session()->get('error')}}
                </div>
                
            @endif
            <form action="{{route('store.category')}}" class="form" method="post">
                @csrf
                <h1>Form to add Category</h1>
                <div class="form-group">
                    <label for="" class="control-label">Category Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Sub category of</label>
                    <div>
                        <select name="category_id" id="" class="form-control">
                            <option value="">no subcategory</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
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