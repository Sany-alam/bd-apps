@extends('app')
@section('View-apk','active')
@section('body')
<div class="container">
    <div class="row m-0">
        @if (session('message'))
        <div class="col-12">
            <div class="alert alert-info">{{session('message')}}</div>
        </div>
        @endif
        @if (count($apks)>0)
        @foreach ($apks as $apk)
            <div class="col-lg-4 col-md-6 my-2">
                <div class="card">
                    <img class="card-img-top" src="{{asset('logo/'.$apk->logo)}}" alt="">
                    <div class="card-body">
                        <h3 class="card-title">Name : {{$apk->name}}</h3>
                        <h5 class="card-title m-0">Account : {{$apk->account->username}}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item py-0">Android : {{$apk->android_id}}</li>
                        <li class="list-group-item py-0">BDapps : {{$apk->bdapps_id}}</li>
                        <li class="list-group-item py-0">Type : {{$apk->type}}</li>
                    </ul>
                    <div class="card-body py-0">
                        <p class="card-text">Details : {{$apk->details}}</p>
                    </div>
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <a class="btn btn-warning" href="{{url('edit-apk/'.$apk->id)}}">Edit</a>
                        <a class="btn btn-danger" href="{{url('delete-apk/'.$apk->id)}}">Delete</a>
                    </div>
                </div>
            </div>
        @endforeach
        @else
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center">No apk available</div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
