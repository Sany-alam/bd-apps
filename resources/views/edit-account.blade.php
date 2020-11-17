@extends('app')
@section('View-account','active')
@section('body')
<div class="container">
    <div class="card m-auto" style="max-width: 300px">
        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-info">{{session('message')}}</div>
            @endif
            <form action="{{url('update-account')}}" method="post">@csrf
                <input type="hidden" id="id" name="id" class="form-control" placeholder="Username" value="{{$account->id}}">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="{{$account->username}}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" id="password" name="password" class="form-control" placeholder="Password" value="{{$account->password}}">
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
