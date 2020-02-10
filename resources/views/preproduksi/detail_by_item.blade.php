@extends('layout.main1')

@section('bradcrumb')
    Data Preproduksi
@endsection
@section('onpagecss')
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
    <div class="row">
        {{-- <div class="col-12">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Recipient's username">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
            </div>
        </div> --}}
        {{-- <div class="col-3">

        </div>
        <div class="col-3">

        </div>
        <div class="col-3">

        </div>
        <div class="col-3">

        </div> --}}
        <div class="card col-12 mb-4">
            <div class="card-header bg-white font-weight-bold">
                {{-- title --}}
                Preproduksi {{$item_name.' Tgl : '.$date}}
            </div>
            <div class="card-body">
                {{-- body --}}
                
                <table class="table table-hover mb-0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Waktu</th>
                        <th>Oleh</th>
                        <th class="col-1 text-right">-</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($data_preproduksi as $key => $prep)
                            <tr>
                                <th scope="row">{{$i++.'.'}}</th>
                                <td>{{$prep->jml_item}}</td>
                                <td>{{$prep->getUnit()->name}}</td>
                                <td>{{$prep->time}}</td>
                                <td>{{$prep->getUser()->name}}</td>
                                <td>
                                    {{-- {{$prep->id}} --}}
                                    <form action="" class="form-inline text-right">
                                        @csrf
                                        <button type="button" class="btn btn-primary">Edit</button>
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            <div class="card-footer bg-white">
                {{-- footer --}}
                {{-- {{$data_preproduksi->links()}} --}}
            </div>
        </div>
    </div>
@endsection

@section('onpagejs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn_delete').on('click', function(){
                $.confirm({
                                title: 'Hapus Data',
                                content: 'Yakin hapus data?',
                                buttons: {
                                    cancel: function () {
                                    },
                                    confirm: {
                                        btnClass : 'btn-danger',
                                        action : function() {
                                            console.log('deleted');
                                        }
                                    }
                                }
                            });
            })
        })
    </script>
@endsection