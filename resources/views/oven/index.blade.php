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
        
            <div class="card mb-4">
                <div class="card-header bg-white font-weight-bold">
                    Filled &amp; Justified
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs nav-fill mb-3" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="home-tab-2" data-target="wait" data-toggle="tab" href="#wait" role="tab" aria-controls="wait" aria-selected="true">Tunggu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab-2" data-target="proccess" data-toggle="tab" href="#proccess" role="tab" aria-controls="proccess" aria-selected="false">Oven</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab-2" data-target="complete" data-toggle="tab" href="#complete" role="tab" aria-controls="complete" aria-selected="false">Keluar</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane active show" id="wait" role="tabpanel" aria-labelledby="wait-tab-2">
                            
                        </div>
                        <div class="tab-pane fade" id="proccess" role="tabpanel" aria-labelledby="proccess-tab-2">
                            
                        </div>
                        <div class="tab-pane fade" id="complete" role="tabpanel" aria-labelledby="complete-tab-2">
                            
                        </div>
                    </div>
                </div>
            </div>
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

        $("#wait").load("{{route('oven.LoadTunggu')}}");
        // $('#wait').tab('show').load("{{route('oven.LoadTunggu')}}");
        // $('#proccess').tab('show').load("{{route('oven.LoadIn')}}");
        // $('#complete').tab('show').load("{{route('oven.LoadOut')}}");
        // $('#wait').tab('hide').load("{{route('oven.LoadTunggu')}}");


        $('#LoadDT').on('click', function(){
            $("#loadContentTunggu").load("{{route('oven.LoadTunggu')}}");
        });

        $('#LoadDI').on('click', function(){
            $("#loadContentIn").load("{{route('oven.LoadIn')}}");
        });

        $('#LoadDO').on('click', function(){
            $("#loadContentOut").load("{{route('oven.LoadOut')}}");
        });

        $(".nav-tabs a").click(function(){
            if($(this).data('target') == 'wait') {

                if($("#wait").hasClass('active show')){
                    $("#wait").removeClass('active show');
                }

                $("#wait").addClass('active show');

                $("#wait").load("{{route('oven.LoadTunggu')}}");
                
            } else if ($(this).data('target') == 'proccess') {

                $("#wait").removeClass('active show');
                $("#complete").removeClass('active show');
                $("#proccess").addClass('active show');
                $("#proccess").load("{{route('oven.LoadIn')}}");

            } else if ($(this).data('target') == 'complete') {
                $("#wait").removeClass('active show');
                $("#proccess").removeClass('active show');
                $("#complete").addClass('active show');
                $("#complete").load("{{route('oven.LoadOut')}}");
            }
            // console.log($(this).data('target'));
        });

    });
    </script>
@endsection
