@extends('layout.main1')

@section('onpagecss')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
@endsection

@section('bradcrumb')
    Dashboard
@endsection

@section('boxs')
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
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header bg-white font-weight-bold">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-6">
                            Tabel Stock
                        </div>
                        <div class="col-md-6 col-sm-6 col-6 text-right">
                            <a href="{{route('stock.create')}}" class="btn btn-primary">Tambah Stock</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="tbl_stock" class="table table-hover" cellspacing="0" width="100%">
                        <thead class="thead-light">
                            <tr>
                                {{-- <th scope="col">#</th> --}}
                                <th scope="col">Nama</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Type</th>
                                <th scope="col">Date</th>
                                <th scope="col">-</th>
                            </tr>
                        </thead>
                        @php
                            $n=1;
                        @endphp
                        <tbody>
                            {{-- @foreach ($data_stock as $stock)
                                <tr>
                                    <td>{{$n++}}</td>
                                    <td>{{$stock->getItem()->item_name}}</td>
                                    <td>{{$stock->item_qty}}</td>
                                    <td>
                                        @if ($stock->stock_type == 'in')
                                            <span class="badge badge-primary">    
                                        @else
                                            <span class="badge badge-danger">
                                        @endif    
                                        {{$stock->stock_type}}</span>
                                    </td>
                                    <td>{{$stock->stock_date}}</td>
                                    <td>
                                        <a href="#"><i class="fa fa-eye text-info"></i></a>
                                        <a href="#"><i class="fa fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                    <div class="col text-center">
                        {{-- {{$data_stock->links()}} --}}
                    </div>
                </div>
            </div>   
        </div>
    </div>
@endsection

@section('onpagejs')

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script>

$( document ).ready(function() {
    $('#tbl_stock').DataTable({
        processing:true,
        serversiide:true,
        ajax:"{{route('dataStock')}}",
        columns : [
            { data : 'item_name', name:'item_name' },
            { data : 'item_qty', name:'item_qty' },
            { data : 'stock_type', name:'stock_type' },
            { data : 'stock_date', name:'stock_date' },
            { data : 'id', name:'id' },
        ]
    });
});

</script>    
@endsection