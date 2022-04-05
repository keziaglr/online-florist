@extends('header')

@section('content')

<div style="margin: 50px 100px">
  <h2> <strong class="d-flex justify-content-center" >Manage Couriers</strong> </h2>
    <form action="/courier" class="d-flex justify-content-center;" style="margin: 50px 300px" >
        <input id="search" name="q" class="form-control me-sm-2" type="search" placeholder="I want to find..">
        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
    </form>
  @if (auth()->user()->role == 'admin')
  <div class="d-flex justify-content-center">
    <a href="{{url('courier/insert')}}" type="submit" class="btn btn-primary">Insert Courier</a>
  </div>
  @endif

<div style="margin: 50px 100px">
  <div class="row" style="justify-content:space-evenly">
@foreach ($couriers as $courier)
<div class="card bg-secondary mb-3" style="max-width: 20rem;">
  <div class="card-header">ID : {{$courier->id}}</div>
  <div class="card-body">
    <h4 class="card-title">{{$courier->name}}</h4>
    <p class="card-text">Cost: Rp {{$courier->cost}}</p>
    <a href="{{url('courier/update/'.$courier->id)}}" class="btn btn-warning">Update</a>
    <a href="{{url('courier/delete/'.$courier->id)}}" class="btn btn-danger">Delete</a>
  </div>
</div>
@endforeach

</div>
@endsection
