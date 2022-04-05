@extends('header')

@section('content')

<div style="margin: 50px 100px">
  <h2> <strong class="d-flex justify-content-center" >Manage Flower Types</strong> </h2>
    <form action="/flower/type" class="d-flex justify-content-center;" style="margin: 50px 300px" >
        <input id="search" name="q" class="form-control me-sm-2" type="search" placeholder="I want to find..">
        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
    </form>
  @if (auth()->user()->role == 'admin')
  <div class="d-flex justify-content-center">
    <a href="{{url('flower/type/insert')}}" type="submit" class="btn btn-primary">Insert Flower Type</a>
  </div>
  @endif

<div style="margin: 50px 100px">
  <div class="row" style="justify-content:space-evenly">
@foreach ($flowertypes as $flowertype)
<div class="card bg-secondary mb-3" style="max-width: 20rem;">
  <div class="card-header">Flower Type</div>
  <div class="card-body">
    <h4 class="card-title">{{$flowertype->typename}}</h4>
    <a href="{{url('flower/type/update/'.$flowertype->id)}}" class="btn btn-warning">Update</a>
    <a href="{{url('flower/type/delete/'.$flowertype->id)}}" class="btn btn-danger">Delete</a>
  </div>
</div>
@endforeach

</div>
@endsection
