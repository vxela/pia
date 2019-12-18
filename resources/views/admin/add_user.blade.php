@extends('layout.main1')

@section('bradcrumb')
    Dashboard > User > create
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 offset-lg-3">
            @if(Session::has('alert'))
                <div class="alert alert-{{Session::get('alert.status')}} alert-dismissible" role="alert">
                    {{Session::get('alert.msg')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
        <div class="card mb-4">
            <div class="card-header bg-white font-weight-bold">
                <div class="row">
                    <div class="col-md-12">
                        Tambah User
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="item_unit" class="mr-sm-2">Nama Pegawai</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control" name="emp_name" id="emp_name" required>
                                <option value="">Pilih Pegawai</option>
                                @foreach ($data_emp as $emp)
                                    <option value="{{$emp->id}}">{{$emp->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="item_name" class="mr-sm-2">Username</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control mb-2 mr-sm-2" name="user_name" id="user_name" placeholder="username" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="item_unit" class="mr-sm-2">Password</label>
                        </div>
                        <div class="col-md-8 input-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                            <div class="input-group-append show_pass" id="show_pass">
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="fa fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="item_unit" class="mr-sm-2">Ulangi Password</label>
                        </div>
                        <div class="col-md-8 input-group">
                            <input type="password" class="form-control" name="password2" id="password2" placeholder="password" required>
                            <div class="input-group-append show_pass2" id="show_pass2">
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="fa fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="item_unit" class="mr-sm-2">Role</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control" name="role_id" id="role_id" required>
                                <option value="">Pilih Gudang</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-4">
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                        <div class="col-md-8 col-8 text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>   
    </div>
</div>
@endsection

@section('onpagejs')
    <script>
    $(document).ready(function(){
        $('.show_pass').on('click', function(){
            if($('#password').attr('type') == 'password') {
                $('#password').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
            }
        });
        $('.show_pass2').on('click', function(){
            if($('#password2').attr('type') == 'password') {
                $('#password2').attr('type', 'text');
            } else {
                $('#password2').attr('type', 'password');
            }
        });
    });
    </script>
@endsection