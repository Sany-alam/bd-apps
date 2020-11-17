@extends('app')
@section('View-account','active')
@section('body')
<div class="container">
    @if (session('message'))
        <div class="alert alert-info">{{session('message')}}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Username</th>
              <th scope="col">Password</th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($accounts as $account)
        <tr>
            <td>{{$account->id}}</td>
            <td>{{$account->username}}</td>
            <td>{{$account->password}}</td>
            <td>
                <a class="btn btn-warning" href="{{ url('edit-account/'.$account->id) }}">Edit</a>
            </td>
            <td>
                <a class="btn btn-danger" href="{{ url('delete-account/'.$account->id) }}">Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
