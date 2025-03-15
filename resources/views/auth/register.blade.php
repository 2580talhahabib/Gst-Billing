@extends('layouts.app')
@section('content')
<div class="login-box">
    <div class="login-logo">
      <a href="{{ asset('') }}"><b>GST</b>Billing</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Register to start your session</p>
  
        <form action="{{ asset('') }}" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        
        <!-- /.social-auth-links -->
  
        <p class="mb-1">
          <a href="{{ route('forgot_password') }}">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="{{ route('login') }}" class="text-center">Login Here</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
@endsection