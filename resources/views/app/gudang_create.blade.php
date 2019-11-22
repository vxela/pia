@extends('layout.main')

@section('bradcrumb')
    Dashboard > Gudang > Create
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
                    Tambah Gudang
                    {{-- <div class="row">
                    </div> --}}
                </div>
                <div class="card-body">            
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Item</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><a href="#">00000077</a></td>
                            <td>Praesent eu viverra leo</td>
                            <td>Kevin Dion</td>
                            <td><span class="badge badge-success">Shipped</span></td>
                        </tr>
                        <tr>
                            <td><a href="#">00000078</a></td>
                            <td>Lorem ipsum dolor</td>
                            <td>Mark Otto</td>
                            <td><span class="badge badge-success">Shipped</span></td>
                        </tr>
                        <tr>
                            <td><a href="#">00000079</a></td>
                            <td>Etiam eleifend elit</td>
                            <td>Jacob Thornton</td>
                            <td><span class="badge badge-info">Packaging</span></td>
                        </tr>
                        <tr>
                            <td><a href="#">00000080</a></td>
                            <td>Donec vitae ante egestas</td>
                            <td>Larry the Bird</td>
                            <td><span class="badge badge-secondary">Back Ordered</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection