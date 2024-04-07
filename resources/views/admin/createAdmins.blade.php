@extends('admin.layout.layout')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('store.admins')}}" method="post" class="form">
                @csrf
                <h1>Registration Form</h1>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session()->get('message')}}
                    </div>
                @endif
                <h1>Registration Form</h1>
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{session()->get('error')}}
                    </div>
                @endif
                <div class="form-group">
                    <label for="" class="control-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                    <span class="text-danger">
                        @error('name')
                            {{$message}}
                        @enderror
                    </span>
                </div>
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
                    <label for="" class="control-label">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control">
                    <span class="text-danger">
                        @error('confirm_password')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Role</label>
                    <select name="role" id="" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                    <span class="text-danger">
                        @error('role')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" style="margin-top: 5px" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
<hr>

@endsection