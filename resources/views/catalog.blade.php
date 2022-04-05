@extends('header')

@section('content')
<div style="margin: 50px 100px">
<h2> <strong class="d-flex justify-content-center" >Catalog</strong> </h2>
    <form action="/home" class="d-flex justify-content-center;" style="margin: 50px 300px" >
        <input id="search" name="q" class="form-control me-sm-2" type="search" placeholder="I want to buy..">
        <button class="btn my-2 my-sm-0 btn-outline-dark" type="submit">Search</button>
    </form>

<div style="margin-top: 50px">
  <div class="row" style="justify-content:space-evenly">
  @foreach ($flowers as $flower)
  <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="{{url('/image/'.$flower->image)}}" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">{{$flower->name}}</h5>
        <p class="card-text">{{$flower->description}}</p>
        <div class="row">
          @if (auth()->user() != null)
            <a href="{{url('cart/order/'.$flower->id)}}" class="btn btn-primary" style="margin-bottom: 20px">Order</a>
            <a href="{{url('flower/detail/'.$flower->id)}}" class="btn btn-secondary">Details</a>
          @endif
        </div>
      </div>
  </div>
  @endforeach

<div style="justify-content:space-around; margin-top:50px" >
  <div>
    <div class="d-flex justify-content-center">
      <ul class="pagination">
          <li class="page-item">
              <a class="page-link" href="{{$flowers->previousPageUrl()}}">&laquo;</a>
          </li>
          @for($i = 1; $i <= $flowers->lastPage(); $i++)
              @if($i == $flowers->currentPage())
                  <li class="page-item active">
                      <a class="page-link" href="#">{{$i}}</a>
                  </li>
              @else
                  <li class="page-item">
                      <a class="page-link" href="{{$flowers->url($i)}}">{{$i}}</a>
                  </li>
              @endif
          @endfor
          <li class="page-item">
              <a class="page-link" href="{{$flowers->nextPageUrl()}}">&raquo;</a>
          </li>
      </ul>
    </div>
    </div>
</div>
</div>
</div>
  @endsection
