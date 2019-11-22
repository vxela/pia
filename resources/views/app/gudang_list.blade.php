@extends('layout.main')

@section('bradcrumb')
    Dashboard > Gudang
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
        <div class="col-4 offset-4">
            <div class="card">
                <div class="card-header bg-white font-weight-bold">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-6">
                            List Gudang
                        </div>
                        <div class="col-md-6 col-sm-6 col-6 text-right">
                            <a href="{{route('gudang.create')}}" class="btn btn-primary btn-sm">Tambah Gudang</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">            
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">-</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_gudang as $gudang)
                                <tr>
                                    <td>{{$gudang->name}}</td>
                                    <td>{{$gudang->lokasi}}</td>
                                    <td>
                                        <a href="#" style="text-decoration: none;">
                                            <i class="fas fa-search text-primary"></i>
                                        </a>
                                        <a href="#" style="text-decoration: none;">
                                            <i class="fa fa-edit text-info"></i>
                                        </a>
                                        <a href="#" style="text-decoration: none;">
                                            <i class="fas fa-trash text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection