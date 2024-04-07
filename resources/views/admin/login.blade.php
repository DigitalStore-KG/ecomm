@extends('admin.layout.layout')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('loginCheck.admins')}}" method="post" class="form">
                @csrf
                <h1>Registration Form</h1>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session()->get('message')}}
                    </div>
                @endif
                <div class="form-group">
                    <label for="" class="control-label">Email Address</label>
                    <input type="email" name="email" class="form-control">
                    <span class="text-danger">
                        @error('email')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Password</label>
                    <input type="password" name="password" class="form-control">
                    <span class="text-danger">
                        @error('password')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Role</label>
                    <input type="text" name="role" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Log In</button>
                </div>
            </form>
        </div>
    </div>
</div>
<hr>

@endsection