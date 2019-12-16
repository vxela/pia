@extends('layout.main1')

@section('onpagecss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection

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
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    <script>
        $(document).ready(function(){
            
            // toastr.options = {
            // "closeButton": true, "debug": false, "newestOnTop": false, "progressBar": false, "positionClass": "toast-top-full-width", "preventDuplicates": false, "onclick": null, "showDuration": "300", "hideDuration": "1000", "timeOut": "5000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "linear", "showMethod": "fadeIn", "hideMethod": "fadeOut"
            // };

            // toastr["success"]("data changed")


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
                            $('.notif').click();
                            $.notify("New data update", { className:"success" ,position:"bottom left" });
                            $('#data_content').load('{{route('screen.loaddata')}}');
                            console.log(data)
                            
                        }
                    }
                });
            }


            //load data every 1 second
            setInterval(load,2000);
        });
    </script>
@endsection