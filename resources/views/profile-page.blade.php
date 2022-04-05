@extends('header')

@section('content')
<form action="{{ url('user/profile') }}" style="margin: 50px 100px" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <h2> <strong class="d-flex justify-content-center" >Profile</strong> </h2>
    @if ($errors->any())
    <div class="alert alert-dismissible alert-danger">
        {{$errors->first()}}
    </div>
    @endif
    <div class="form-group">
        <label class="form-label mt-4" >Name</label>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="name" id="floatingInput" placeholder="Name" value="{{$user->name}}">
            <label for="floatingInput">Name</label>
        </div>
        <label class="form-label mt-4" >E-mail Address</label>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" value="{{$user->email}}">
            <label for="floatingInput">E-mail Address</label>
        </div>
        <label class="form-label mt-4" >Phone Number</label>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="phone" id="floatingInput" placeholder="Phone Number" value="{{$user->phone}}">
            <label for="floatingInput">Phone Number</label>
        </div>
        <label class="form-label mt-4" >Gender</label>
        @if ($user->phone == 'female')
        <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="gender" id="optionsRadios1" value="male" >
              Male
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="gender" id="optionsRadios2" value="female" checked>
                Female
            </label>
        </div>
        @else
        <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="gender" id="optionsRadios1" value="male" checked >
              Male
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="gender" id="optionsRadios2" value="female">
                Female
            </label>
        </div>
        @endif
        <div class="form-group">
            <label for="exampleTextarea" class="form-label mt-4">Address</label>
            <textarea class="form-control" id="address" name="address" rows="3">{{$user->address}}</textarea>
          </div>
        </div>
        <div class="form-group">
            <label for="formFile" class="form-label mt-4">Image</label>
            <input class="form-control" type="file" id="image" name="image" value="{{old('image')}}">
        </div>
        <input style="margin: 25px 0" type="submit" class="btn btn-primary" value="Update">
</form>
@endsection
