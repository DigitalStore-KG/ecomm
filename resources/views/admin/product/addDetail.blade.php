@extends('admin.layout.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            @if (session()->has('message'))
                    <div for="" class="alert alert-success text-center">{{session()->get('message')}}</div>
                @endif
                @if (session()->has('error'))
                    <label for="" class="alert alert-success text-center">{{session()->get('error')}}</label>
                @endif
            <form style="font-size:18px;" class="form-horizontal form-label-left" action="{{route('storeDetail.product')}}" method="post" class="form">
                @csrf
                <h1>Extra Details</h1>
                
                <div class="form-group">
                    <label for="" class="control-label">Title <span class="required">*</span> </label>
                    <input name="title" type="text" class="form-control" value="{{@$product->itemdetail->title}}">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Total Items</label>
                    <input value="{{@$product->itemdetail->total_items}}" name="total_items" type="number" step="0.01" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Description</label>
                    <textarea name="description" class="form-control" id="" rows="10">{{@$product->itemdetail->description}} </textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-large btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection