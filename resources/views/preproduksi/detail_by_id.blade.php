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
        <div class="col-12">
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
                    Data Preduksi [ID : {{$prep->id}}] [{{$prep->getItem()->item_name}}]
                </div>
                <div class="card-body">
                    <form action="{{route('preproduksi.item_update', ['id' => $prep->id])}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Item ID</label>
                            <div class="col-sm-10 col-form-label">
                                <b>{{$prep->id}}</b>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Item Type</label>
                            <div class="col-sm-10 col-form-label">
                                <b>{{$prep->getItem()->item_name}}</b>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah (Biji)</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="jumlah_item" name="jumlah_item" placeholder="Jumlah Item" value="{{$prep->jml_item}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Satuan</label>
                            <div class="col-sm-10 col-form-label">
                                <b>Biji</b>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Jam Input</label>
                            <div class="col-sm-10 col-form-label">
                                <b>{{$prep->date}} {{$prep->time}}</b>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Update Date</label>
                            <div class="col-sm-10 col-form-label">
                                @if ($prep->created_at == $prep->updated_at)
                                    <b>-</b>
                                @else
                                    <b>{{$prep->updated_at}}</b>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10 col-form-label">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-danger">Hapus Data</button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- <div class="card-footer bg-white">
                    I am a card footer.
                </div> --}}
            </div>
        </div>
    </div>
    {{-- <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">
    </div> --}}
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