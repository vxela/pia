@extends('layout.main1')

@section('bradcrumb')
    Dashboard Packing
@endsection

@section('onpagecss')
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="row">

    {{-- mush_60 --}}

    <div class="col-lg-6 offset-lg-3">
        @if(Session::has('alert'))
            <div class="alert alert-{{Session::get('alert.status')}} alert-dismissible" role="alert">
                {{Session::get('alert.msg')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        
        

        <div class="col-12">
            <div class="row d-flex justify-content-center">
                @foreach ($data_pia as $pia)
                    <div class="col-6 text-center py-2 mb-2">
                        <button class="btn btn-success py-4 btn_pia" style="width:100%;" data-toggle="modal"
                        data-target="#modal_input_pia" data-title="{{$pia->item_name}}" data-item_id="{{$pia->id}}" id="btn_pia">
                        {{$pia->item_name}} 
                        </button>
                    </div>                 
                    @endforeach
                    <div class="col-6 text-center py-2 mb-2">
                        <button class="btn btn-success py-4 btn_pia" style="width:100%;" data-toggle="modal"
                        data-target="#modal_input_pia_campur" data-title="" data-item_id="" id="btn_pia"> CAMPURAN
                        </button>
                    </div>                 
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_input_pia" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{'/packing/store'}}" method="post">
                <div class="modal-body" id="loadContentTunggu">
                    @csrf
                    <input type="hidden" name="id_pia" id="id_pia" value="1">
                    <div class="row mb-2">
                        <div class="col-12">
                            <input type="number" class="form-control form-control-lg mb-3" name="jml_produk" id="jml_produk" value="1" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-lg btn-warning bt-minus" id="bt-minus" style="width: 100%">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-lg btn-success bt-plus" id="bt-plus" style="width: 100%">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="reset" class="btn btn-lg btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-lg btn-primary">Simpan</button>
                    {{-- <div class="row">
                        <div class="col-6 text-right">
                        </div>
                        <div class="col-6 text-left">
                        </div>
                    </div> --}}
                </div>                
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="modal_input_pia_campur" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Input Campuran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{'/packing/store/campur'}}" method="post">
                <div class="modal-body" id="loadContentTunggu">
                    @csrf
                    @foreach ($data_pia as $pia)
                        <div class="row mb-2">
                            <div class="col-12">
                                <label for=""><strong>{{$pia->item_name}}</strong></label>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-block btn-lg btn-warning btn_cmnus" id="btn_cmnus"><i class="fa fa-minus-circle"></i></button>
                            </div>
                            <div class="col-6 px-0" id="form_jml">
                                <input type="hidden" name="id_pia[]" id="id_pia" value="{{$pia->id}}">
                                <input type="number" class="form-control form-control-lg" name="jml_produk[]" id="jml_produk" value="0" min="0" style="text-align:center;">
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-block btn-lg btn-success btn_cplus" id="btn_cplus"><i class="fa fa-plus-circle"></i></button>
                            </div>
                        </div>                        
                    @endforeach
                </div>
                <div class="modal-footer text-center">
                    <button type="reset" class="btn btn-lg btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-lg btn-primary">Simpan</button>
                </div>                
            </form>

        </div>
    </div>
</div>

@endsection

@section('onpagejs')
    <script>
    $(document).ready(function() {
        $.ajaxSetup({ cache: false });

        $('#modal_input_pia').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var title = button.data('title')
            var id = button.data('item_id')
            var modal = $(this)
            modal.find('.modal-title').text(title)
            modal.find('.modal-body #id_pia').val(id)

            // modal.find('.modal-body #produk_id').val(id) 
        });

        $('.btn_cmnus').on('click', function() {
            var jmlc = parseInt($(this).parents('.row').find('input[id=jml_produk]').val());
            if(jmlc > 0) {
                $(this).parents('.row').find('input[id=jml_produk]').val(jmlc - 1);
            }
        });

        $('.btn_cplus').on('click', function() {
            var jmlc = parseInt($(this).parents('.row').find('input[id=jml_produk]').val());
            $(this).parents('.row').find('input[id=jml_produk]').val(jmlc + 1);
        });

        $('.bt-minus').click(function(){
            var jml = $('#jml_produk').val()
            if(jml>1) {
                $('#jml_produk').val($('#jml_produk').val() - 1);
            }
        });
        
        $('.bt-plus').click(function(){
            var jml = $('#jml_produk').val()
            if(jml<10) {
                $('#jml_produk').val(+$('#jml_produk').val() + 1);
            }
        });

    });
    </script>
@endsection
