<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/Bootstrap/bootstrap.min.css')}}">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="card">
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-info">{{session('message')}}</div>
                @endif
                <form action="{{url('login')}}" method="post">@csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" id="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <button class="btn btn-primary ml-auto" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
