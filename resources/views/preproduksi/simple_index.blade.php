@extends('layout.main1')

@section('bradcrumb')
    Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 col-sm-12 col-xs-12 offset-lg-3">
        @if(Session::has('alert'))
            <div class="alert alert-{{Session::get('alert.status')}} alert-dismissible" role="alert">
                {{Session::get('alert.msg')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        <div class="col-12">
            <div class="row">
                <div class="col-6 mb-3"><button type="button" class="p-4 btn btn-primary btn-lg">Large button</button></div>
                <div class="col-6 mb-3"><button type="button" class="p-4 btn btn-primary btn-lg">Large button</button></div>
                <div class="col-6 mb-3"><button type="button" class="p-4 btn btn-primary btn-lg">Large button</button></div>
                <div class="col-6 mb-3"><button type="button" class="p-4 btn btn-primary btn-lg">Large button</button></div>
                <div class="col-6 mb-3"><button type="button" class="p-4 btn btn-primary btn-lg">Large button</button></div>
                <div class="col-6 mb-3"><button type="button" class="p-4 btn btn-primary btn-lg">Large button</button></div>
                <div class="col-6 mb-3"><button type="button" class="p-4 btn btn-primary btn-lg">Large button</button></div>
            </div>
        </div> 
    </div>
</div>
@endsection