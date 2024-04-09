@extends('customer.layout.layout')

@section('content')

<div class="span8" style="border:2px solid green;">
    @if (session()->has('message'))
        <div class="alert alert-success">{{session()->get('message')}} </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">{{session()->get('error')}} </div>
    @endif
    <div style="padding: 10px;" >
        <form action="{{route('loginPermission.customer')}}" method="post" class="form">
            @csrf
            <h1>Login Form</h1>
            
            <div class="form-group">
                <label for="" class="control-label">Email Address</label>
                <input type="email" name="email" class="form-control">
                @error('email')
                    <span style="color:red;">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="" class="control-label">Password</label>
                <input type="password" name="password" class="form-control">
                @error('email')
                    <span style="color:red;">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-large btn-primary" type="submit">Login</button>
            </div>
        </form>
        <div style="text-align:right;">
            <a href=""><button class="btn btn-large btn-success">Register</button> </a>
        </div>
    </div>
</div>

@endsection
