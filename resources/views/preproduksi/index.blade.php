@extends('layout.main1')

@section('bradcrumb')
    Dashboard
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
                <div class="row">
                    <div class="col-md-12">
                        Tambah Produk Setengah Jadi
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('preproduksi.store')}}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="item_name" class="mr-sm-2">Nama Produk</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control" name="produk_id" id="produk_id" required>
                                <option value="">Pilih Produk</option>
                                @foreach ($data_produk as $produk)
                                <option value="{{$produk->id}}">{{$produk->item_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>                    
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="item_unit" class="mr-sm-2">Jumlah Produksi</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" class="form-control mb-2 mr-sm-2" name="jml_produk" id="jml_produk" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="item_name" class="mr-sm-2">Unit</label>
                        </div>
                        <div class="col-md-8">
                            @foreach ($data_unit as $unit)
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="unit_id" id="unit_id" value="{{$unit->id}}">{{$unit->name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-4">
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                        <div class="col-md-8 col-8 text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>   
    </div>
</div>
@endsection