@extends('layout.main1')

@section('bradcrumb')
    {{-- Produksi {{Carbon\Carbon::now()->format('F Y')}} --}}
@endsection

@section('content')
    <div class="col-12">
        @php
            $ndate = Carbon\Carbon::now()->formatLocalized('%A, %d %B');
        @endphp
        <div class="mb-3 text-center">
            <h2>Produksi {{$ndate}}</h2>
        </div>
        <div class="row">
            
        </div>
    </div>
@endsection

@section('onpagejs')
    <script src="{{asset('dist/js/fullcalendar.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.sidebar-toggle').click();

            function load() {
                $.ajax({
                    type    : 'get',
                    url     : 'http://127.0.0.1:8000/screen/rtData',
                    success : function(data) {

                        console.log(data);
                    }
                });
            }

            //load data every 1 second
            setInterval(load,2000);
        });
    </script>
@endsection