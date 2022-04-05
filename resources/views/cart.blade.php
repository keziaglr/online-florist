@extends('header')

@section('content')

    <div style="margin: 50px 100px">
        <h2> <strong class="d-flex justify-content-center" >Cart</strong> </h2>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Picture</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($carts as $cart)
                    <tr>
                        <td scope="col"><img style="width:200px" src="{{url('/image/'.$cart->flower->image)}}" alt=""></td>
                        <td scope="col">{{$cart->flower->name}}</td>
                        <td scope="col">{{$cart->quantity}}</td>
                        <td scope="col">{{$cart->flower->price}}</td>
                        <td scope="col">
                            <a href="{{url('cart/delete/'.$cart->flower->id)}}" class="btn btn-danger">Remove</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <form action="/checkout" >
                <div class="form-group">
                    <label for="exampleSelect1" class="form-label mt-4">Courier</label>
                    <select class="form-select" id="exampleSelect1" name="courier">
                        @foreach ($couriers as $courier)
                            <option value="{{$courier->id}}">{{$courier->name}} - {{$courier->cost}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group d-flex justify-content-between" style="margin-top: 20px">
                    <h4>Total Price : Rp. {{$total}}</h4>
                    <button class="btn my-2 my-sm-0 btn-primary" type="submit">Checkout</button>
                </div>
            </form>

        </div>

@endsection
