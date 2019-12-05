@extends('layout.main1')

@section('bradcrumb')
    {{-- Produksi {{Carbon\Carbon::now()->format('F Y')}} --}}
@endsection

@section('content')
    <div class="col-12">
        @php
            $ndate = Carbon\Carbon::parse($date)->formatLocalized('%A, %d %B');
        @endphp
        <div class="mb-3 text-center">
            <h2>Produksi {{$ndate}}</h2>
        </div>
        <div class="row">
            @php
                $bg = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];
            @endphp
            @foreach ($data_stock as $cst)
                <div class="col-3 mb-3">
                    <div class="col-md">
                        <div class="d-flex border">
                            @php
                                $nbg = $bg[rand(0,7)];
                                if($nbg == 'light') {
                                    $btxt = 'dark';
                                } else {
                                    $btxt = 'light';
                                }
                            @endphp
                            <div class="bg-{{$nbg}} text-{{$btxt}} p-4">
                                <div class="d-flex align-items-center h-100">
                                    <i class="fa fa-3x fa-fw fa-cubes"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 bg-white p-4">
                                <p class="text-uppercase text-secondary mb-0" style="font-weight: bold">{{$cst->item_name}}</p>
                                <h3 class="font-weight-bold mb-0" style="display: inline;">{{$cst->item_qty.' '}}</h3><small>{{$cst->item_unit}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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