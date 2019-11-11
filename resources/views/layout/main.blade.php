<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{asset('dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/bootadmin.min.css')}}">

    <title>Pia App</title>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand navbar-dark bg-danger">
    <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
    <a class="navbar-brand" href="#">PIA App</a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a href="#" id="dd_user" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{auth()->user()->name}}</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                    <a href="#" class="dropdown-item">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="d-flex">
    <div class="sidebar sidebar-dark bg-dark">
        <ul class="list-unstyled">
            <li><a href="#"><i class="fa fa-fw fa-tachometer-alt"></i> Menu Item</a></li>
            <li>
                <a href="#sm_expand_1" data-toggle="collapse">
                    <i class="fa fa-fw fa-table"></i> Expandable Menu Item
                </a>
                <ul id="sm_expand_1" class="list-unstyled collapse">
                    <li><a href="#">Submenu Item</a></li>
                    <li><a href="#">Submenu Item</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-fw fa-link"></i> Tabel Barang</a></li>
            <li><a href="#"><i class="fa fa-fw fa-link"></i> Tamba</a></li>
            <li><a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a></li>
        </ul>
    </div>

    <div class="content p-4">
        <h5 class="mb-4">
            @yield('bradcrumb')
        </h5>

        @yield('content')
        {{-- <div class="card mb-4">
            <div class="card-body">
            </div>
        </div> --}}
    </div>
</div>

<script src="{{asset('dist/js/jquery.min.js')}}"></script>
<script src="{{asset('dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dist/js/bootadmin.min.js')}}"></script>

</body>
</html>