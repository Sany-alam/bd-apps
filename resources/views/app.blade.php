<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* The side navigation menu */
        .sidenav {
        height: 100%; /* 100% Full-height */
        width: 250px; /* 0 width - change this with JavaScript */
        position: fixed; /* Stay in place */
        z-index: 1; /* Stay on top */
        top: 0; /* Stay at the top */
        left: 0;
        background-color: #111; /* Black*/
        overflow-x: hidden; /* Disable horizontal scroll */
        padding-top: 0px; /* Place content 60px from the top */
        transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
        }

        .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
        }

        .sidenav a:hover {
        color: #f1f1f1;
        }

        .sidenav a.active {
        color: #f1f1f1;
        }

        .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
        }

        #main {
        transition: margin-left .5s;
        padding: 20px;
        margin-left: 250px;
        }

        @media screen and (max-width: 768px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
        .main{margin-left: 0}
        #main{margin-left: 0}
        #mySidenav{width: 0}
        }
    </style>
    @yield('css')
    <link rel="stylesheet" href="{{asset('assets/Bootstrap/bootstrap.min.css')}}">
</head>
<body>
    <div id="mySidenav" class="sidenav">
        <ul class="nav flex-column">
            <li class="nav-item"><a href="javascript:void(0)" class="nav-link mr-auto" onclick="closeNav()">&times;</a></li>
            <li class="nav-item"><a href="{{url('/')}}" class="nav-link @yield('Add-apk')">Add apk</a></li>
            <li class="nav-item"><a href="{{url('view-apk')}}" class="nav-link @yield('View-apk')">View apk</a></li>
            <li class="nav-item"><a href="{{url('add-account')}}" class="nav-link @yield('Add-account')">Add account</a></li>
        </ul>
    </div>

    <nav class="navbar navbar-dark bg-dark">
        <a href="javascript:;" onclick="openNav()" class="navbar-toggler"><i class="navbar-toggler-icon"></i></a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="{{url('logout')}}">Logout</a></li>
        </ul>
    </nav>

    <div id="main">
        @yield('body')
    </div>

    <script src="{{asset('assets/Bootstrap/jquery-3.5.1.slim.min.js')}}"></script>
    <script src="{{asset('assets/Bootstrap/bootstrap.bundle.min.js')}}"></script>
    @yield('js')
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>
</body>
</html>
