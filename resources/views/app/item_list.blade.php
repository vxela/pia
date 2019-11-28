@extends('layout.main')

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
                    <div class="d-flex bd-highlight">
                        <div class="p-2 bd-highlight">
                            <a href="{{route('item.create')}}" class="btn btn-primary">Tambah Item</a>
                        </div>
                        <div class="ml-auto p-2 bd-highlight">
                            <form class="input-group" action="{{route('item.index')}}" method="get">
                                <input type="text" class="form-control" placeholder="search item" name="search" id="search">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </form>   
                        </div>
                    </div>
                    {{-- <div class="row">
                        
                        <div class="col-xs-6 col-md-9 col-sm-6 text-left">
                            <a href="{{route('item.create')}}" class="btn btn-primary">Tambah Item</a>
                        </div>
                        <div class="col-xs-6 col-md-3 col-sm-6 text-right">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="search item">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="card-body">
                    <table class="table mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Gudang</th>
                                @if (auth()->user()->user_role == 1)
                                    <th align="right">action</th>
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
                                    <td>{{$item->getGudang()->name}}</td>
                                    @if (auth()->user()->user_role == 1)
                                        <td align="right">
                                            <a href="{{'/dashboard/item/'.$item->id}}"><i class="fa fa-eye text-info"></i></a>
                                            <a href="#" id="btn-delete" class="btn-pill btn-delete" data-method="delete" data-id_item="{{$item->id}}" data-url="{{'/dashboard/item/'.$item->id}}">
                                                <i class="fas fa-trash fa-fw text-danger"></i>
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{$data_item->links()}}
                    </div>
                </div>
            </div>   
        </div>
    </div>
@endsection