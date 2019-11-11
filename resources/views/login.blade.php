
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{asset('dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/bootadmin.min.css')}}">

    <title>Login | PIA App</title>
</head>
<body class="bg-light">

        <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-4">
            	<div>
            		<img src="">
            	</div>
                <h1 class="text-center mb-4">PIA APP</h1>
                <div class="card">
                    <div class="card-body">
                        @if (Session::has('alert'))
                            @if (Session::get('alert.type') == 'danger')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                            @else
                                <div class="alert alert-success alert-dismissible" role="alert">
                            @endif
                                {{Session::get('alert.msg')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif
                        <form action="{{route('auth')}}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" name="name" class="form-control" placeholder="Username" required>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
{{-- 
                            <div class="form-check mb-3">
                                <label class="form-check-label">
                                    <input type="checkbox" name="remember" class="form-check-input">
                                    Remember Me
                                </label>
                            </div> --}}

                            <div class="row">
                                <div class="col pr-2">
                                    <button type="submit" class="btn btn-block btn-primary">Login</button>
                                </div>
                                {{-- <div class="col pl-2">
                                    <a class="btn btn-block btn-link" href="#">Forgot Password</a>
                                </div> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="{{asset('dist/js/jquery.min.js')}}"></script>
<script src="{{asset('dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dist/js/datatables.min.js')}}"></script>
<script src="{{asset('dist/js/moment.min.js')}}"></script>
<script src="{{asset('dist/js/fullcalendar.min.js')}}"></script>
<script src="{{asset('dist/js/bootadmin.min.js')}}"></script>

</body>
</html>