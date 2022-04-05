@extends('header')

@section('content')

<div style="margin-top: 75px;">
  <h2> <strong class="d-flex justify-content-center" >Manage Users</strong> </h2>

  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Picture</th>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Gender</th>
        <th scope="col">Address</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
      <tr>
        <td scope="col"><img style="width:200px" src="{{url('/image/'.$user->image)}}" alt=""></td>
        <td scope="col">{{$user->name}}</td>
        <td scope="col">{{$user->phone}}</td>
        <td scope="col">{{$user->gender}}</td>
        <td scope="col">{{$user->address}}</td>
        <td scope="col">
            <a href="{{url('user/update/'.$user->id)}}" class="btn btn-warning">Update</a>
            <a href="{{url('user/delete/'.$user->id)}}" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
@endsection
