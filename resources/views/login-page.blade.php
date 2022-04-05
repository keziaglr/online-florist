@extends('header')
@section('content')
  <div>
      <form action="{{ url('user/login') }}" style="margin: 50px 100px" method="POST">
          {{csrf_field()}}
          <fieldset>
            <h2> <strong class="d-flex justify-content-center">Login</strong> </h2>
            @if ($errors->any())
            <div class="alert alert-dismissible alert-danger">
                {{$errors->first()}}
            </div>
            @endif
            @if(session()->has('message'))
            <div class="alert alert-dismissible alert-danger">
                {{ session()->get('message') }}
            </div>
            @endif
            <div class="form-group">
              <label class="form-label mt-4" >E-mail Address</label>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                <label for="floatingInput">E-mail Address</label>
              </div>
              <label class="form-label mt-4" >Password</label>
              <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>
            </div>
            <div class="form-check" style="margin: 25px 0">
              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="rememberme">
              <label class="form-check-label" for="flexCheckDefault">
                Remember Me
              </label>
            </div>
            <button style="margin: 0 0 25px 0" type="submit" class="btn btn-primary">Login</button>
        </form>
          <div>
              <a style="text-decoration: none" href="" class="text-primary">Forgot Your Password?</a>
          </div>
    </div>
@endsection
