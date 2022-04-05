@extends('header')

@section('content')
    <div style="margin: 50px 100px">
        <legend> <h2 class="d-flex justify-content-center" >Flower Details</h2> </legend>
        <div class="d-flex justify-content-center">
            <img class="img-fluid" style="width: 500px; margin-right: 40px" src="{{url('/image/'.$flower->image)}}" alt="Card image cap">
            <div class="flex-column">
                <div>
                    <h3>{{$flower->name}}</h3>
                    <p>{{$flower->description}}</p>
                    <legend> <small>Rp. {{$flower->price}}</small> </legend>
                    <p>Stock : {{$flower->stock}}</p>
                </div>
                <div>
                    @if ($errors->any())
                        <div class="alert alert-dismissible alert-danger">
                            {{$errors->first()}}
                        </div>
                    @endif
                    @if(session()->has('message'))
                        <div class="alert alert-dismissible alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <form action="{{ url('cart/add/'.$flower->id) }}" class="d-flex">
                        {{csrf_field()}}
                        <input type="number" class="form-control" name="quantity" id="floatingInput" value="{{old('quantity')}}">
                        <button type="submit" class="btn btn-outline-dark">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
