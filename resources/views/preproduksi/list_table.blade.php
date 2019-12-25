@extends('layout.main1')

@section('bradcrumb')
    Data Preproduksi
@endsection
@section('onpagecss')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="{{asset('/datepicker/css/datepicker.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
                <div class="row">
                    <div class="col-6">
                        Data Preproduksi
                    </div>
                    <div class="col-6 justify-content-end">
                        <div class="input-group">
                            <input type="text" readonly name="tgl_prep" id="tgl_prep" class="form-control form-control-sm col-lg-5 offset-lg-7 col-sm-8 offset-md-4 col-xs-12 tgl_prep" value="{{$date}}">
                            <input type="hidden" readonly name="date_now" class="date_now" id="date_now" value="{{date('Y-m-d')}}">
                            <div class="input-group-append">
                                <a href="{{'/preproduksi'}}" class="input-group-text text-light cari" style="background-color:#28a745; border:1px solid #28a745;" id="cari" style="cursor:pointer;"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" id="data_preproduksi">
                {{-- body --}}
                
                <table class="table table-hover mb-0">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Jumlah (Biji)</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($data_preproduksi as $key => $prep)
                            <tr>
                                <th scope="row">{{$i++.'.'}}</th>
                                <td>{{$prep->item_name}}</td>
                                <td>{{$prep->jml.' Biji'}}</td>
                                <td>
                                    {{
                                        Mush::getJml($prep->jml)
                                    }}
                                </td>
                                <td>    
                                    <a href="{{'/preproduksi/item'.'/'.$prep->id}}" class="btn btn-primary btn-sm">Detail</a>
                                    {{-- <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                        <button type="button" class="btn btn-success"><i class="fa fa-eye"></i></button>
                                        <button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></button>
                                        <button type="button" class="btn btn-danger btn_delete" id="btn_delete"><i class="fa fa-trash-o"></i></button>
                                    </div> --}}
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
<script src="{{asset('/datepicker/js/bootstrap-datepicker.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    <script>
        $(document).ready(function() {
            //setup ajax headers setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //set date by datepicker
            $('#tgl_prep').datepicker({
                format : 'yyyy-mm-dd'
            }).on('changeDate', function(){
                $('#tgl_prep').datepicker('hide');

                var date_start = new Date('2019-12-23');
                var date_cari = new Date($('#tgl_prep').val());
                var date_now = new Date($('#date_now').val());

                if(date_cari < date_start || date_cari > date_now) {
                    $.notify("Date not in range", { className:"warning" ,position:"top right" });
                    $('.cari').attr('href', '#')
                } else {
                    $('.cari').attr('href', '/preproduksi/'+$('#tgl_prep').val())
                }
            });
        })
    </script>
@endsection