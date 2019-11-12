@extends('layout.main')

@section('bradcrumb')
    Dashboard > Item > create
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
                        Tambah Item
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('item.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="item_name" class="mr-sm-2">Nama Barang</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control mb-2 mr-sm-2" name="item_name" id="item_name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="item_unit" class="mr-sm-2">Satuan</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control mb-2 mr-sm-2" name="item_unit" id="item_unit" required>
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