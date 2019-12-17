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
                            <select class="form-control" name="gudang_id" id="gudang_id" required>
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
                            <input type="text" class="form-control mb-2 mr-sm-2" name="item_name" id="item_name" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="item_unit" class="mr-sm-2">Password</label>
                        </div>
                        <div class="col-md-8 input-group">
                            <input type="password" class="form-control" name="item_unit" id="item_unit" required>
                            <div class="input-group-append" id="show_pass">
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
                            <input type="password" class="form-control" name="item_unit" id="item_unit" required>
                            <div class="input-group-append" id="show_pass">
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
                            <select class="form-control" name="gudang_id" id="gudang_id" required>
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