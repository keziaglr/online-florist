@extends('header')
@section('content')
<form action="{{ url('courier/update/'.$courier->id) }}" style="margin: 50px 100px" method="POST">
    {{csrf_field()}}
<h2> <strong class="d-flex justify-content-center">Update Courier</strong> </h2>
    @if ($errors->any())
    <div class="alert alert-dismissible alert-danger">
        {{$errors->first()}}
    </div>
    @endif
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Courier Id</label>
        <div class="col-sm-10">
            <input type="text" readonly="" class="form-control-plaintext" id="staticEmail" value="{{$courier->id}}">
        </div>
    </div>
    <div class="form-group">
        <label class="form-label mt-4" >Courier Name</label>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="courier_name" placeholder="Courier Name" name="courier_name" value="{{$courier->name}}">
            <label for="floatingInput">Courier Name</label>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label mt-4" >Shipping Cost</label>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="shipping_cost" placeholder="Shipping Cost" name="shipping_cost" value="{{$courier->cost}}">
            <label for="floatingInput">Shipping Cost</label>
        </div>
    </div>
        <input style="margin: 25px 0" type="submit" class="btn btn-primary" value="Update">
</form>
@endsection
