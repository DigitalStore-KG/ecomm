@extends('customer.layout.layout')

@section('content')

<div class="span8" style="border: 2px solid green">
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{session()->get('error')}}
        </div>
    @endif
    <div style="padding: 10px;">
        <form action="{{route('storeUser.customer')}}" method="post" class="form">
            @csrf
            <h1>Registration Form</h1>
            <hr>
            <div class="form-group">
                <label for="" class="control-label">Name</label>
                <input type="text" name="name" class="form-control">
                <span style="color: red;">
                    @error('name')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="" class="control-label">Email Address</label>
                <input type="email" name="email" class="form-control">
                <span style="color: red;">
                    @error('email')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="" class="control-label">Password</label>
                <input type="password" name="password" class="form-control">
                <span style="color:red;">
                    @error('password')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="" class="control-label">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
                <span style="color:red;">
                    @error('confirm_password')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <button class="btn btn-large btn-primary">Register</button>
            </div>
        </form>
    </div>
</div>

@endsection