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
            <div class="row d-flex justify-content-center">
                @foreach ($data_pia as $pia)
                    <div class="col-6 text-center py-2 mb-2">
                        <button class="btn btn-success py-4" style="width:100%;" data-toggle="modal" data-target="#exampleModal">{{$pia->item_name}}</button>
                    </div>                    
                @endforeach
            </div>
        </div>
        <div class="modal fade bd-example-modal-sm" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="col-12">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus cursus maximus lacus vel ullamcorper. Duis euismod, risus vel faucibus imperdiet, nisl massa congue dolor, ut mollis lacus tortor eget velit. Nam non urna risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis metus orci, consectetur sed risus at, accumsan imperdiet elit. Nullam semper finibus lacus nec volutpat. Fusce convallis nulla ipsum, et hendrerit elit feugiat non.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection