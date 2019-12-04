@extends('layout.main1')

@section('bradcrumb')
    {{-- Produksi {{Carbon\Carbon::now()->format('F Y')}} --}}
@endsection

@section('content')
    <div class="col-12">
        {{-- <div class="row"> --}}
            <div class="card mb-4">
                <div class="card-header bg-white font-weight-bold text-center">
                    {{Carbon\Carbon::now()->format('F Y')}}
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>#</th>
                            @foreach ($data_pia as $pia)
                            <th>{{$pia->item_name}}</th>
                            @endforeach
                        </thead>
                        <tbody>
                            @foreach ($data_stock as $stock)
                                <tr>
                                    <td>#</td>
                                        @for ($i = 0; $i < count($data_pia); $i++)
                                        {{$data_pia->item_name}}
                                            {{-- @foreach ($data_pia as $pia)
                                                @if ($pia->id == $stock->item_id)
                                                    <td>{{$stock->item_qty}}</td>
                                                @endif
                                            @endforeach --}}

                                        @endfor
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        {{-- </div> --}}
    </div>
@endsection

@section('onpagejs')
    <script src="{{asset('dist/js/fullcalendar.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.sidebar-toggle').click();
        });
    </script>
@endsection