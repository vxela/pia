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
                <div class="card-body">
                    <ul class="nav nav-tabs nav-fill mb-3" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="home-tab-2" data-target="wait" data-toggle="tab" href="#wait" role="tab" aria-controls="wait" aria-selected="true">Tunggu</a>
                            {{-- <a class="nav-link active show" id="home-tab-2" data-target="wait" data-route_url="{{route('oven.LoadTunggu')}}" data-toggle="tab" href="#wait" role="tab" aria-controls="wait" aria-selected="true">Tunggu</a> --}}
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
                            <button type="button" class="btn btn-sm btn-success btncheck">Check All</button>
                            <div class="row border-top waitspace" id="waitspace">
                                <div class="col-1 " id="cbox" style="margin : auto;">
                                    <input type="checkbox" name="item_id[]" value="2911">
                                </div>
                                <div class="col-10">
                                    <strong>PIA COKLAT</strong>
                                    <hr class="my-0 border-light">
                                    <small>1 Langser</small>
                                </div>
                                <div class="col-1 p-0" style="margin : auto;">
                                    <form action="http://127.0.0.1:8000/oven/move_data_wait" method="post">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-sign-in"></i>
                                        </button>
                                        <input type="hidden" name="prep_id" value="2911">
                                        <input type="hidden" name="_token" value="De76AofFWEbHqQhCk0Fr9c0YrLt8y63o9FbAneb8">
                                    </form>
                                </div>
                            </div>
                            <div class="row border-top waitspace" id="waitspace">
                                <div class="col-1 " id="cbox" style="margin : auto;">
                                    <input type="checkbox" name="item_id[]" value="2911">
                                </div>
                                <div class="col-10">
                                    <strong>PIA COKLAT</strong>
                                    <hr class="my-0 border-light">
                                    <small>1 Langser</small>
                                </div>
                                <div class="col-1 p-0" style="margin : auto;">
                                    <form action="http://127.0.0.1:8000/oven/move_data_wait" method="post">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-sign-in"></i>
                                        </button>
                                        <input type="hidden" name="prep_id" value="2911">
                                        <input type="hidden" name="_token" value="De76AofFWEbHqQhCk0Fr9c0YrLt8y63o9FbAneb8">
                                    </form>
                                </div>
                            </div>
                            <div class="row border-top waitspace" id="waitspace">
                                <div class="col-1 " id="cbox" style="margin : auto;">
                                    <input type="checkbox" name="item_id[]" value="2911">
                                </div>
                                <div class="col-10">
                                    <strong>PIA COKLAT</strong>
                                    <hr class="my-0 border-light">
                                    <small>1 Langser</small>
                                </div>
                                <div class="col-1 p-0" style="margin : auto;">
                                    <form action="http://127.0.0.1:8000/oven/move_data_wait" method="post">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-sign-in"></i>
                                        </button>
                                        <input type="hidden" name="prep_id" value="2911">
                                        <input type="hidden" name="_token" value="De76AofFWEbHqQhCk0Fr9c0YrLt8y63o9FbAneb8">
                                    </form>
                                </div>
                            </div>
                            <div class="col-12" id="parentWait">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="proccess" role="tabpanel" aria-labelledby="proccess-tab-2">
                            
                        </div>
                        <div class="tab-pane fade" id="complete" role="tabpanel" aria-labelledby="complete-tab-2">
                            
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection

@section('onpagejs')
    <script>
    $(document).ready(function() {
        $.ajaxSetup({ cache: false });
        $(".nav-tabs a").click(function(){

            var Turl = '{{route('oven.LoadTunggu')}}';
            var Iurl = '{{route('oven.LoadIn')}}';
            var Ourl = '{{route('oven.LoadOut')}}';

            var resdata;

            if($(this).data('target') == 'wait') {
            
                if($("#wait").hasClass('active show')) {
                    $("#wait").removeClass('active show');
                }

                $("#wait").addClass('active show');
                
                $.ajax({
                    url : '{{route('oven.LoadTunggu')}}',
                    type : 'GET',
                    cache : false,
                    success : function(json) {
                        $("#parentWait").empty();
                        $("#parentWait").html('');
                        // $("#parentWait").append('<div class="row" id="waitspace"><div class="col-12 pb-2" id="" style="margin : auto;"><button type="button" class="btn btn-sm btn-success btncheck">Check All</button></div>');
                        for(i = 0; i < Object.keys(json).length; i++) {
                            $("#parentWait").append($('<div>').attr({'class' : 'row border-top waitspace', 'id' : 'waitspace'+json[i].id}));
                            $("#waitspace"+json[i].id).append($('<div>').attr({'class' : 'col-1 ', 'id' : 'cbox', 'style' : 'margin : auto;'}).append('<input type="checkbox" name="item_id[]" value='+json[i].id+' />'));
                            $("#waitspace"+json[i].id).append($('<div>').attr('class', 'col-10').append('<strong>'+json[i].item_name+'</strong><hr class="my-0 border-light"><small>'+json[i].item_jml+'</small>'));
                            $("#waitspace"+json[i].id).append($('<div>').attr({'class' : 'col-1 p-0', 'style' : 'margin : auto;'}).append('<form action="{{route('oven.move_to_oven')}}" method="post"><button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i></button><input type="hidden" name="prep_id" value="'+json[i].id+'">@csrf</form>'));
                        }
                        $("#parentWait").append('<div class="row" id="waitspace"><div class="col-12 pb-2 text-right" id="cbox" style="margin : auto;"><button type="submit" class="btn btn-success">Pindah</button></div></div>')
                    }
                });
            } else if ($(this).data('target') == 'proccess') {
                if($("#wait").hasClass('active show')) {
                    $("#wait").removeClass('active show');
                }
                $("#wait").addClass('active show');
                $.ajax({
                    url : '{{route('oven.LoadIn')}}',
                    type : 'GET',
                    cache : false,
                    success : function(json) {
                        // console.log(json);
                        $("#parentWait").empty();
                        $("#parentWait").html('');
                        for(i = 0; i < Object.keys(json).length; i++) {
                            $("#parentWait").append($('<div>').attr({'class' : 'row border-top waitspace', 'id' : 'waitspace'+json[i].id}));
                            $("#waitspace"+json[i].id).append($('<div>').attr({'class' : 'col-1 ', 'id' : 'cbox', 'style' : 'margin : auto;'}).append('<input type="checkbox" name="item_id[]" value='+json[i].id+' />'));
                            $("#waitspace"+json[i].id).append($('<div>').attr('class', 'col-10').append('<strong>'+json[i].item_name+'</strong><hr class="my-0 border-light"><small>'+json[i].item_jml+'</small>'));
                            $("#waitspace"+json[i].id).append($('<div>').attr({'class' : 'col-1 p-0', 'style' : 'margin : auto;'}).append('<form action="{{route('oven.move_from_oven')}}" method="post"><button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i></button><input type="hidden" name="prep_id" value="'+json[i].id+'">@csrf</form>'));
                        }
                    }
                });
            } else if ($(this).data('target') == 'complete') {
                if($("#wait").hasClass('active show')) {
                    $("#wait").removeClass('active show');
                }
                $("#wait").addClass('active show');
                $.ajax({
                    url : '{{route('oven.LoadOut')}}',
                    type : 'GET',
                    cache : false,
                    success : function(json) {
                        // console.log(json);
                        $("#parentWait").empty();
                        $("#parentWait").html('');
                        for(i = 0; i < Object.keys(json).length; i++) {
                            $("#parentWait").append($('<div>').attr({'class' : 'row border-top waitspace', 'id' : 'waitspace'+json[i].id}));
                            $("#waitspace"+json[i].id).append($('<div>').attr('class', 'col-12').append('<strong>'+json[i].item_name+'</strong><hr class="my-0 border-light"><small>'+json[i].item_jml+'</small>'));
                        }
                    }
                });
            }
            
        });
        $(".btncheck").on('click', function(){
            console.log('clicked');
        })

    });
    </script>
@endsection
