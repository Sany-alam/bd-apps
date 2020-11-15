@extends('app')
@section('Add-apk','active')
@section('body')
<div class="container">
    <div class="card m-auto" style="max-width: 500px">
        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-info">{{session('message')}}</div>
            @endif
            <form action="{{url('add-apk')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="form-group">
                    <label for="apk">Apk</label><br>
                    <input accept=".apk" type="file" id="apk" name="apk" required>
                </div>
                <div class="form-group">
                    <label for="logo">Logo</label><br>
                    <input accept="image/*" type="file" id="logo" name="logo" required>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="account_id">Account</label>
                    <select class="form-control" name="account_id" id="account_id" required>
                        <option value="">Select account</option>
                        @foreach ($accounts as $account)
                            <option value="{{$account->id}}">{{$account->username}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="android_id">Android app id</label>
                    <input class="form-control" type="text" id="android_id" name="android_id" placeholder="Android app id" required>
                </div>
                <div class="form-group">
                    <label for="bdapps_id">BDapps app id</label>
                    <input class="form-control" type="text" id="bdapps_id" name="bdapps_id" placeholder="BD app id" required>
                </div>
                <div class="form-group">
                    <label for="type">Apps type</label>
                    <input type="text" id="type" name="type" class="form-control" placeholder="Apps type" required>
                </div>
                <div class="form-group">
                    <label for="details">Details</label>
                    <textarea id="details" name="details" class="form-control" placeholder="Details"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection
