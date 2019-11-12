@extends('layout.main')

@section('bradcrumb')
    Dashboard > item > create
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 offset-lg-3">
        <div class="card mb-4">
            <div class="card-header bg-white font-weight-bold">
                <div class="row">
                    <div class="col-md-12">
                        Tambah Item
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Satuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($data_item as $item)
                            <tr>
                                <td>{{$n++}}</td>
                                <td>{{$item->item_code}}</td>
                                <td>{{$item->item_name}}</td>
                                <td>{{$item->item_unit}}</td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>   
    </div>
</div>
@endsection