@extends('v_admin.layout.app')

@section('bradcrumb')
    Dashboard
@endsection

@section('content')
@if(Session::has('alert'))
    <div class="alert alert-{{Session::get('alert.status')}} alert-dismissible" role="alert">
        {{Session::get('alert.msg')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header bg-white font-weight-bold">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-6">
                        Tabel Barang
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 text-right">
                        <a href="{{route('admin.add_user')}}" class="btn btn-success">Tambah User</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Job</th>
                            <th class="text-center">Model Target</th>
                            <th class="text-center">Data target</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">UserID</th>
                            <th class="text-center">Desc</th>
                            <th class="text-center">Created</th>
                            <th class="text-center">Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_log as $log)
                            <tr>
                                <td>{{$log->job}}</td>
                                <td class="text-center">{{$log->model_target}}</td>
                                <td class="text-center">{{$log->data_target}}</td>
                                <td class="text-center">{{$log->status}}</td>
                                <td class="text-center">{{$log->user_id}}</td>
                                <td class="text-center">{{$log->desc}}</td>
                                <td class="text-right">{{$log->created_at}}</td>
                                <td class="text-right">{{$log->updated_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>   
    </div>
</div>
@endsection