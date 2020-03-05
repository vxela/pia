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
                            <div class="col-12" id="parentWait">
                                <div class="row">
                                    <div class="col-1">
                                        <input type="checkbox" id="" style="vertical-align: bottom;">
                                    </div>
                                    <div class="col-10">
                                        <strong>PIA KACANG HIJAUnnn</strong>
                                        <hr class="my-0">
                                        <strong>1 Langser</strong>
                                    </div>
                                    <div class="col-1 p-0">
                                        <form action="http://pia.roxzon.com/oven/move_data_wait" method="post">
                                            <button type="submit" class="btn btn-primary" style="margin: auto !important;">
                                                <i class="fa fa-sign-in"></i>
                                            </button>
                                            <input type="hidden" name="prep_id" value="4336">
                                            <input type="hidden" name="_token" value="MPeK2r07KdhPWFuhzx82HGmpfgpDJVCAN9aIaYXb">
                                        </form>
                                    </div>
                                </div>
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
        // $("#loadContentTunggu").load("{{route('oven.LoadTunggu')}}");

        // $("#wait").load("{{route('oven.LoadTunggu')}}");
        // $('#wait').tab('show').load("{{route('oven.LoadTunggu')}}");
        // $('#proccess').tab('show').load("{{route('oven.LoadIn')}}");
        // $('#complete').tab('show').load("{{route('oven.LoadOut')}}");
        // $('#wait').tab('hide').load("{{route('oven.LoadTunggu')}}");

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
                        // console.log(json);
                        $("#parentWait").empty();
                        $("#parentWait").html('');
                        for(i = 0; i < Object.keys(json).length; i++) {
                            $("#parentWait").append($('<div>').attr({'class' : 'row border-top waitspace', 'id' : 'waitspace'+json[i].id}));
                            $("#waitspace"+json[i].id).append($('<div>').attr({'class' : 'col-1 ', 'id' : 'cbox', 'style' : 'margin : auto;'}).append('<input type="checkbox" name="item_id[]" value='+json[i].id+' />'));
                            $("#waitspace"+json[i].id).append($('<div>').attr('class', 'col-10').append('<strong>'+json[i].item_name+'</strong><hr class="my-0 border-light"><small>'+json[i].item_jml+'</small>'));
                            $("#waitspace"+json[i].id).append($('<div>').attr({'class' : 'col-1 p-0', 'style' : 'margin : auto;'}).append('<form action="{{route('oven.move_to_oven')}}" method="post"><button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i></button><input type="hidden" name="prep_id" value="'+json[i].id+'">@csrf</form>'));
                            // $("#waitspace").append($('<div>').attr('class','col-1').text(json[i].id+'-'+json[i].item_jml+'-'+json[i].item_name));

                        }
                    }
                });
                // $("#wait").html("{{route('oven.LoadTunggu')}}");
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
            
        });

    });
    </script>
@endsection
