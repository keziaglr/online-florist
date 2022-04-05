@extends('header')

@section('content')

<div style="margin: 50px 100px">
    <h2> <strong class="d-flex justify-content-center" >Transaction History</strong> </h2>
    @foreach($transactions as $transaction)
        <?php $total = 0 ?>
        <div style="margin-top: 100px">
            <p>Transaction ID : {{$transaction->id}}</p>
            <p>Transaction Date : {{$transaction->transaction_date}}</p>
            <p>Member Name : {{$transaction->user->name}}</p>
            <p>Courier : {{$transaction->courier->name}}</p>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Picture</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($transaction->detail as $td)
                    <tr>
                        <td scope="col"><img style="width:200px" src="{{url('/image/'.$td->flower->image)}}" alt=""></td>
                        <td scope="col">{{$td->flower->name}}</td>
                        <td scope="col">{{$td->quantity}}</td>
                        <td scope="col">{{$td->flower->price}}</td>
                        <?php $total += $td->quantity *  $td->flower->price ?>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <h3>Total : Rp. {{$total}}</h3>
            @endforeach
        </div>
@endsection
