@extends('header')

@section('content')
<form action="{{ url('flower/update/'.$flower->id) }}" style="margin: 50px 100px" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <h2> <strong class="d-flex justify-content-center" >Update Flower</strong> </h2>
    @if ($errors->any())
    <div class="alert alert-dismissible alert-danger">
        {{$errors->first()}}
    </div>
    @endif
    <div class="form-group">
        <label class="form-label mt-4" >Flower Name</label>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="flower_name" placeholder="Flower Name" name="flower_name" value="{{$flower->name}}">
            <label for="floatingInput">Flower Name</label>
        </div>
        <label class="form-label mt-4" >Flower Price</label>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="flower_price" placeholder="Flower Price" name="flower_price" value="{{$flower->price}}">
            <label for="floatingInput">Flower Price</label>
        </div>
        <label class="form-label mt-4" >Flower Stock</label>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="flower_stock" placeholder="Flower Stock" name="flower_stock" value="{{$flower->stock}}">
            <label for="floatingInput">Flower Stock</label>
        </div>
        <div class="form-group">
            <label for="exampleSelect1" class="form-label mt-4">Flower Type</label>
            <select class="form-select" id="exampleSelect1" name="flower_type" value="{{old('flower_type')}}">
              @foreach ($flowertypes as $flowertype)
                <option value="{{$flowertype->typename}}">{{$flowertype->typename}}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleTextarea" class="form-label mt-4">Flower Description</label>
            <textarea class="form-control" id="exampleTextarea" rows="4" name="flower_desc">{{$flower->description}}</textarea>
          </div>
        </div>
        <div class="form-group">
            <label for="formFile" class="form-label mt-4">Image_Url</label>
            <input class="form-control" type="file" id="formFile" name="flower_image" value="{{old('flower_image')}}">
        </div>
        <input style="margin: 25px 0" type="submit" class="btn btn-primary" value="Update">
</form>
@endsection
