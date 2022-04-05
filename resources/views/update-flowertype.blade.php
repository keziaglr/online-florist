@extends('header')
@section('content')
<form action="{{ url('flower/type/update/'.$flowertype->id) }}" style="margin: 50px 100px" method="POST">
    {{csrf_field()}}
<h2> <strong class="d-flex justify-content-center">Insert Flower Type</strong> </h2>
    @if ($errors->any())
    <div class="alert alert-dismissible alert-danger">
        {{$errors->first()}}
    </div>
    @endif
    <div class="form-group">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Flower Type Id</label>
            <div class="col-sm-10">
                <input type="text" readonly="" class="form-control-plaintext" id="staticEmail" value="{{$flowertype->id}}">
            </div>
        </div>
        <label class="form-label mt-4" >Flower Type Name</label>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="typename" placeholder="Flower Type Name" name="typename" value="{{$flowertype->typename}}">
            <label for="floatingInput">Flower Type Name</label>
        </div>
        <input style="margin: 25px 0" type="submit" class="btn btn-primary" value="Insert">
</form>
@endsection
