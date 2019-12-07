@extends('layout.main1')

@section('bradcrumb')
    Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 col-sm-12 col-xs-12 offset-lg-3">
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
                        <button class="btn btn-success py-4" style="width:100%;" data-toggle="modal"
                         data-target="#modal_add" data-title="{{$pia->item_name}}" data-item_id="{{$pia->id}}">{{$pia->item_name}}</button>
                    </div>                    
                @endforeach
            </div>
        </div>
        <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{'/preproduksi/simple'}}" method="post">
                        <div class="modal-body">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-12">
                                    <input type="number" class="form-control form-control-lg mb-3" name="jml_produk" id="jml_produk" value="1" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    @php
                                        $n=0;
                                    @endphp
                                    @foreach ($data_unit as $unit)
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="unit_id" id="unit_id" value="{{$unit->id}}" required 
                                                @if ($n==1)
                                                checked
                                                @endif
                                                >{{$unit->name }} 
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row mb-3">
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
                            <input type="hidden" name="produk_id" id="produk_id" value="">
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-lg btn-secondary" data-dismiss="modal">reset</button>
                            <button type="submit" class="btn btn-lg btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('onpagejs')
    <script>
        $(document).ready(function() {

            $('#modal_add').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var title = button.data('title')
                var id = button.data('item_id')
                var modal = $(this)
                modal.find('.modal-title').text(title)
                modal.find('.modal-body #produk_id').val(id) 
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
        })
    </script>
@endsection