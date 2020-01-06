@extends('layout.main1')

@section('bradcrumb')
    Dashboard Oven
@endsection

@section('onpagecss')
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 offset-lg-3">
            @if(Session::has('alert'))
                <div class="alert alert-{{Session::get('alert.status')}} alert-dismissible" role="alert">
                    {{Session::get('alert.msg')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
        
        {{-- <div class="card mb-4">
            <div class="card-header bg-white font-weight-bold">
                <div class="row">
                    <div class="col-md-12">
                        Pemanggangan (Waiting)
                    </div>
                </div>
            </div>
            <div class="card-body">
                @foreach ($data_tunggu as $tunggu)
                    <div class="row mb-1">
                        <div class="col-8">
                            <strong>PIA KEJU</strong>
                            <hr class="m-0">
                            <strong>2</strong> Layer
                        </div>
                        <div class="col-4 text-right my-auto">
                            <button type="button" class="btn btn-primary">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>    
                @endforeach
                <table class="table table-borderless">
                    <tr>
                        <td class="col-10">
                            <strong>PIA KEJU</strong>
                            <hr class="m-0">
                            <strong>2</strong> Layer
                        </td>
                        <td class="col-2">
                            <button type="button" class="btn btn-primary">
                                <i class="fa fa-plus"></i>
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header bg-white font-weight-bold">
                <div class="row">
                    <div class="col-md-12">
                        Pemanggangan (In Process)
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <strong>PIA KEJU</strong>
                        <hr class="m-0">
                        <strong>2</strong> Layer
                    </div>
                    <div class="col-4 text-right my-auto">
                        <button type="button" class="btn btn-success">
                            <i class="fa fa-check"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header bg-white font-weight-bold">
                <div class="row">
                    <div class="col-md-12">
                        Pemanggangan (Done)
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <strong>PIA KEJU</strong>
                        <hr class="m-0">
                        <strong>2</strong> Layer
                    </div>
                    <div class="col-4 text-right my-auto">
                        <button type="button" class="btn btn-success">
                            <i class="fa fa-check"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>  --}}
        <div class="col-12">
            <div class="row d-flex justify-content-center">
                {{-- @foreach ($data_pia as $pia) --}}
                    <div class="col-6 text-center py-2 mb-2">
                        <button class="btn btn-success py-4 LoadDT" style="width:100%;" data-toggle="modal"
                        data-target="#modal_data_wait" data-title="" data-item_id="" id="LoadDT">
                        <i class="fa fa-clock-o"></i>
                        Data Tunggu ({{$tg}})</button>
                    </div>
                    <div class="col-6 text-center py-2 mb-2">
                        <button class="btn btn-success py-4 LoadDI" style="width:100%;" data-toggle="modal"
                        data-target="#modal_data_in" data-title="" data-item_id="" id="LoadDI">
                        <i class="fa fa-sign-in"></i>
                         Data Panggang ({{$pg}})</button>
                    </div>
                    <div class="col-6 text-center py-2 mb-2">
                        <button class="btn btn-success py-4 LoadDO" style="width:100%;" data-toggle="modal"
                        data-target="#modal_data_out" data-title="" data-item_id="" id="LoadDO">
                        <i class="fa fa-sign-out"></i> 
                        Data Selesai ({{$out}})</button>
                    </div>                    
                {{-- @endforeach --}}
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_data_wait" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body" id="loadContentTunggu">

                </div>
                <div class="modal-footer">
                </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_data_in" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body" id="loadContentIn">

                </div>
                <div class="modal-footer">
                </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_data_out" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body" id="loadContentOut">

                </div>
                <div class="modal-footer">
                </div>
        </div>
    </div>
</div>
@endsection

@section('onpagejs')
    <script>
    $(document).ready(function() {
        $.ajaxSetup({ cache: false });
        // $("#loadContentTunggu").load("{{route('oven.LoadTunggu')}}");
        $('#LoadDT').on('click', function(){
            $("#loadContentTunggu").load("{{route('oven.LoadTunggu')}}");
        });

        $('#LoadDI').on('click', function(){
            $("#loadContentIn").load("{{route('oven.LoadIn')}}");
        });

        $('#LoadDO').on('click', function(){
            $("#loadContentOut").load("{{route('oven.LoadOut')}}");
        });
    });
    </script>
@endsection
