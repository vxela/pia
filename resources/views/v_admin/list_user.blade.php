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
                            <th>Code</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">role</th>
                            <th class="text-right">-</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->emp->code}}</td>
                                <td class="text-center">{{$user->name}}</td>
                                <td class="text-center">{{$user->email}}</td>
                                <td class="text-center">{{$user->role->role}}</td>
                                <td class="text-right">
                                    <a href="{{$user->id}}" class="btn btn-primary">Edit</a>
                                    <a href="{{$user->id}}" class="btn btn-danger">Delete</a>
                                </td>
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