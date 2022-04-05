@extends('header')
@section('content')
<form action="{{ url('flower/type/insert') }}" style="margin: 50px 100px" method="POST">
    {{ csrf_field() }}
<h2> <strong class="d-flex justify-content-center">Insert Flower Type</strong> </h2>
    @if ($errors->any())
    <div class="alert alert-dismissible alert-danger">
        {{$errors->first()}}
    </div>
    @endif

    <div class="form-group">
        <label class="form-label mt-4" >Flower Type Name</label>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="typename" placeholder="Flower Type Name" name="typename" value="{{old('typename')}}">
            <label for="floatingInput">Flower Type Name</label>
        </div>
        <input style="margin: 25px 0" type="submit" class="btn btn-primary" value="Insert">
</form>
@endsection
