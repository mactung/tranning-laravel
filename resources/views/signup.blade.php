@extends('layout')

@section('title')
Sign Up
@endsection

@section('content')
<form method="POST" action="/auth/sign-up">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small class="error text-danger" >{{$errors->first('username')}}</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
    <small class="error text-danger" >{{$errors->first('email')}}</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input id="exampleInputPassword1" class="form-control"  type="password"  name="password">
    <small class="error text-danger" >{{$errors->first('password')}}</small>
  </div>

  <button type="submit" class="btn btn-primary">Login</button>
</form>
<a href="/">Sign In Here</a>

@endsection