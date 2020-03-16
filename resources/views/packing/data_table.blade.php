@extends('layout.main1')

@section('bradcrumb')
    Dashboard Packing
@endsection

@section('onpagecss')
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <table class="table table-hover mb-0">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pia</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Satuan</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Oleh</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $n = 1;
                @endphp
                @foreach ($data_pia as $pia)
                    <tr>
                        <td>{{$n++}}</td>
                        <td>{{$pia->getItem()->item_name}}</td>
                        <td>{{$pia->jml_item}}</td>
                        <td>{{$pia->getUnit()->name}}</td>
                        <td>{{$pia->date}}</td>
                        <td>{{$pia->time}}</td>
                        <td>{{$pia->getUser()->name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('onpagejs')
    <script>
    $(document).ready(function() {
        $.ajaxSetup({ cache: false });

        

    });
    </script>
@endsection