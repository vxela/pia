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
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-6">
                            Tabel Item
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
                                    <th scope="col text-right">action</th>
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
                                        <td class="text-right">
                                            <div class="row">
                                                <a href="{{'/dashboard/item/'.$item->id}}"><i class="fa fa-eye text-info"></i></a>
                                                <a href="#" id="btn-delete" class="btn-pill btn-delete" data-method="delete" data-id_item="{{$item->id}}" data-url="{{'/dashboard/item/'.$item->id}}">
                                                    <i class="fas fa-trash fa-fw text-danger"></i>
                                                </a>
                                            </div>
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
    </div>
@endsection