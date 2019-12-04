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
                            <tr>
                                <th>Senin</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Selasa</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Rabu</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Kamis</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Jumat</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Sabtu</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
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