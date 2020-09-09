@extends('layout')

@section('title')
Sign In
@endsection

@section('content')
<form method="POST" action="{{ route('auth.signin') }}">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control @error('title') danger @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    <small class="error text-danger">{{ $errors->first('email') }}</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    <small class="error text-danger">{{ $errors->first('password') }}</small>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<a href="/sign-up">Click here to sign up!</a>

@endsection