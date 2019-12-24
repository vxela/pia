@extends('layout.main1')

@section('bradcrumb')
    Dashboard
@endsection
@section('onpagecss')
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Recipient's username">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12">
            <table class="table table-hover mb-0">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Jumlah (Biji)</th>
                    <th scope="col">Log Waktu</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $i = ($data_preproduksi->currentpage()-1)* $data_preproduksi->perpage() + 1;
                    @endphp
                    @foreach ($data_preproduksi as $key => $prep)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$prep->getItem()->item_name}}</td>
                            <td>{{$prep->jml_item}}</td>
                            <td>{{$prep->getUnit()->name}}</td>
                            <td>{{$prep->time}}</td>
                            <td>    
                                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                    <button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></button>
                                    <button type="button" class="btn btn-danger btn_delete" id="btn_delete"><i class="fa fa-trash-o"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{$data_preproduksi->links()}}
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