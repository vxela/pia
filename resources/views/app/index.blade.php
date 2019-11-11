@extends('layout.main')

@section('bradcrumb')
    Dashboard
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
                        <a href="#" class="btn btn-primary">Add Item</a>
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
                        @foreach ($data_item as $item)
                            <tr>
                                <td>{{$n++}}</td>
                                <td>{{$item->item_code}}</td>
                                <td>{{$item->item_name}}</td>
                                <td>{{$item->item_unit}}</td>
                            </tr>
                        @endforeach
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
                        <a href="#" class="btn btn-primary">Add Item</a>
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
                        @foreach ($data_stock as $stock)
                            <tr>
                                <td>{{$n++}}</td>
                                <td>{{$stock->getItem()->item_name}}</td>
                                <td>{{$stock->item_qty}}</td>
                                <td>{{$item->stock_date}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>   
    </div>
</div>
@endsection