@extends('layout.main')

@section('bradcrumb')
    Dashboard > Item > stock
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header bg-white font-weight-bold">
                <div class="row">
                    <div class="col-md-6">
                        Tabel Barang
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{route('item.create')}}" class="btn btn-primary">Add Item</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Satuan</th>
                        </tr>
                    </thead>
                    @php
                        $n = 1;
                    @endphp
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>   
    </div>
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header bg-white font-weight-bold">
                <div class="row">
                    <div class="col-md-6">
                        Tabel Stock
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{route('stock.create')}}" class="btn btn-primary">Add Stock</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    @php
                        $n=1;
                    @endphp
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>   
    </div>
</div>
@endsection