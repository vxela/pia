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
        <div class="row" id="data_content">
            {{-- <div id="data_content">

            </div> --}}
        </div>
    </div>
    <audio id="notif" class="notif" data-turl="{{asset('dist/notif/messenger.mp3')}}">
        <source src="{{asset('dist/notif/messenger.mp3')}}" type="audio/mpeg">
    </audio>
    {{-- <button class="notif">vv</button> --}}
@endsection

@section('onpagejs')
    <script src="{{asset('dist/js/fullcalendar.min.js')}}"></script>
    {{-- <script src="https://code.createjs.com/createjs-2015.11.26.min.js"></script> --}}
    <script>
        $(document).ready(function(){
            $.ajaxSetup({ cache: false });
            $('.sidebar-toggle').click();
            $('.notif').on('click', function() {
                document.getElementById("notif").play();
            });

            $('#data_content').load('{{route('screen.loaddata')}}');

            // createjs.Sound.registerSound("{{asset('dist/notif/messenger.mp3')}}", "x");
            function load() {
                $.ajax({
                    type    : 'get',
                    url     : '{{route('screen.realtime')}}',
                    success : function(data) {

                        if(data == 'changed') {
                            // createjs.Sound.play("x");
                            
                            $('#data_content').load('{{route('screen.loaddata')}}');
                            console.log(data)
                            
                            // $('.notif').click();
                        }
                    }
                });
            }


            //load data every 1 second
            setInterval(load,2000);
        });
    </script>
@endsection