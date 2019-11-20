<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="{{asset('dist/css/bootadmin.min.css')}}">

    <title>Pia App</title>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand navbar-dark bg-danger">
    <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
    <a class="navbar-brand" href="{{route('dashboard.index')}}">PIA App</a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a href="#" id="dd_user" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{auth()->user()->name}}</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                    <a href="{{route('logout')}}" class="dropdown-item">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="d-flex">
    <div class="sidebar sidebar-dark bg-dark">
        <ul class="list-unstyled">
            <li><a href=" {{route('dashboard.index')}}"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a></li>
            {{-- <li>
                <a href="#sm_expand_1" data-toggle="collapse">
                    <i class="fa fa-fw fa-table"></i> Expandable Menu Item
                </a>
                <ul id="sm_expand_1" class="list-unstyled collapse">
                    <li><a href="#">Submenu Item</a></li>
                    <li><a href="#">Submenu Item</a></li>
                </ul>
            </li> --}}
            {{-- <li><a href="{{route('dashboard.item-stock')}}"><i class="fa fa-fw fa-th"></i> Tambah Item</a></li> --}}
            <li><a href="{{'/dashboard/item'}}"><i class="fa fa-fw fa-table"></i> Data Item</a></li>
            <li><a href="{{route('item.create')}}"><i class="fa fa-fw fa-plus-square"></i> Tambah Item</a></li>
            <li><a href="{{'/dashboard/stock'}}"><i class="fa fa-fw fa-table"></i> Data Stock</a></li>
            <li><a href="{{route('stock.create')}}"><i class="fa fa-fw fa-plus"></i> Tambah Stock</a></li>
            <li><a href="{{route('logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a></li>
        </ul>
    </div>

    <div class="content p-4">
        <h5 class="mb-4">
            @yield('bradcrumb')
        </h5>
        @if(Request::segment(1) === 'dashboard')
            @yield('boxs')
        @endif
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="{{asset('dist/js/myJs.js')}}"></script>

</body>
</html>