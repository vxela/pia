@extends('layout.main')

@section('bradcrumb')
    Dashboard > Gudang > Create
@endsection

@section('content')
    @if(Session::has('alert'))
        <div class="alert alert-{{Session::get('alert.status')}} alert-dismissible" role="alert">
            {{Session::get('alert.msg')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-4 offset-4">
            <div class="card">
                <div class="card-header bg-white font-weight-bold">
                    Tambah Gudang
                    {{-- <div class="row">
                    </div> --}}
                </div>
                <div class="card-body"> 
                    <form action="{{route('gudang.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="gdg_name" class="mr-sm-2">Nama</label>
                            </div>
                            <div class="col-md-8 mb-1">
                                    <input type="text" class="form-control mb-2 mr-sm-2" name="gdg_name" id="gdg_name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mt-2 mb-4">
                                <label for="lokasi" class="mr-sm-2">Lokasi</label>
                            </div>
                            <div class="col-md-8 mt-2 mb-4" id="">
                                <textarea class="form-control" id="gdg_lokasi" name="gdg_lokasi" rows="3" style="margin-top: 0px; margin-bottom: 0px; max-height: 200px"></textarea>
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