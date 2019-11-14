@extends('layout.main')

@section('bradcrumb')
    Dashboard
@endsection

@section('boxs')
    <div class="row mb-4">
        @php
            $color = ['primary','dark','info','warning','danger','success','secondary']
        @endphp
        @foreach ($data_cst as $cst)
            <div class="col-md-3 mb-2">
                <div class="d-flex p-1 bg-{{$color[rand(0,6)]}}">
                </div>
                <div class="d-flex border border-left-0">
                    <div class="flex-grow-1 bg-white p-4">
                        <p class="text-uppercase text-secondary mb-0">{{$cst->getItem()->item_name}}</p> <hr class="m-0">
                        <h5 class="font-weight-bold mb-0">Sisa :<small>{{' '.$cst->qty.' '.$cst->getItem()->item_unit}}</small></h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
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
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header bg-white font-weight-bold">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-6">
                        Tabel Barang
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 text-right">
                        <a href="{{route('item.create')}}" class="btn btn-primary">Tambah Item</a>
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
                            @if (auth()->user()->user_role == 1)
                                <th scope="col">-</th>
                            @endif
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
                                @if (auth()->user()->user_role == 1)
                                    <td>
                                        <a href="{{'dashboard/item/'.$item->id}}"><i class="fa fa-eye"></i></a>
                                        <button type="button" id="btn-delete" class="btn btn-danger btn-pill btn-delete" data-method="delete" data-id_item="{{$item->id}}" data-url="{{'/dashboard/item/'.$item->id}}">
                                            <i class="fas fa-trash fa-fw"></i>
                                        </button>
                                        {{-- {{$item->id}} --}}
                                    </td>
                                @endif
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
                    <div class="col-md-6 col-sm-6 col-6">
                        Tabel Stock
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 text-right">
                        <a href="{{route('stock.create')}}" class="btn btn-primary">Tambah Stock</a>
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
                            <th scope="col">Type</th>
                            <th scope="col">Date</th>
                            <th scope="col">-</th>
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
                                        <a href="#"><i class="fa fa-eye"></i></a>
                                    {{-- {{$stock->id}} --}}
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