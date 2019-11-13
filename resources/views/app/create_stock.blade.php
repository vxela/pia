@extends('layout.main')

@section('bradcrumb')
    Dashboard > Stock > create
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
                        Tambah Stock
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('stock.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="item_name" class="mr-sm-2">Jenis Stock</label>
                        </div>
                        <div class="col-md-8 mb-3">
                            <select class="form-control" name="stock_type" id="stock_type" required>
                                <option value="">Pilih Tipe Stock</option>
                                <option value="in">Stock Masuk</option>
                                <option value="out">Stock Keluar</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="item_name" class="mr-sm-2">Nama Barang</label>
                        </div>
                        <div class="col-md-8 mb-3">
                            <select class="form-control" name="item_cd" id="itemList">
                                <option value="">Pilih Item</option>
                                @foreach ($data_item as $item)
                                    <option value="{{$item->item_code}}" data-satuan="{{$item->item_unit}}">{{$item->item_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="item_unit" class="mr-sm-2">Jumlah Stok</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" class="form-control mb-2 mr-sm-2" name="item_qty" id="item_unit" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mt-2 mb-3">
                            <label for="item_unit" class="mr-sm-2">Satuan</label>
                        </div>
                        <div class="col-md-8 mt-2 mb-3" id="satuan">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mt-2 mb-3">
                            <label for="item_unit" class="mr-sm-2">Deskripsi</label>
                        </div>
                        <div class="col-md-8 mt-2 mb-3" id="satuan">
                            <textarea class="form-control" id="stock_desk" name="stock_desk" rows="3" style="margin-top: 0px; margin-bottom: 0px; max-height: 200px"></textarea>
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