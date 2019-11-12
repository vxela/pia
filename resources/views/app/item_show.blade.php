@extends('layout.main')

@section('bradcrumb')
    Dashboard > Item > {{$item->item_name}}
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 offset-lg-3">
            @if(Session::has('alert'))
                <div class="alert alert-{{Session::get('alert.status')}} alert-dismissible" role="alert">
                    {{Session::get('alert.msg')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
        <div class="card mb-4">
            <div class="card-header bg-white font-weight-bold">
                <div class="row">
                    <div class="col-md-12">
                        Data Item {{$item->item_name}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row bg-light p-3 m-1">
                    <div class="col-4">
                        Kode Item
                    </div>
                    <div class="col-8">
                        {{$item->item_code}}
                    </div>
                </div>
                <div class="row bg-light p-3 m-1">
                    <div class="col-4">
                        Nama Item
                    </div>
                    <div class="col-8">
                        {{$item->item_name}}
                    </div>
                </div>
                <div class="row bg-light p-3 m-1">
                    <div class="col-4">
                        Item Unit
                    </div>
                    <div class="col-8">
                        {{$item->item_unit}}
                    </div>
                </div>
                <div class="row bg-light p-3 m-1">
                    <div class="col-4">
                        Tanggal Input
                    </div>
                    <div class="col-8">
                        {{$item->created_at}}
                    </div>
                </div>
                <div class="row bg-light p-3 m-1">
                    <div class="col-4">
                        Di input oleh
                    </div>
                    <div class="col-8">
                        {{$item->getUser()->name}}
                    </div>
                </div>
                <div class="row bg-light p-3 m-1">
                    <div class="col-12 text-center">
                        <form action="{{'/dashboard/item/'.$item->id}}" method="post">
                            <a href="{{'/dashboard'}}" class="btn btn-primary btn-pill">
                                <i class="fas fa-home fa-fw"></i>
                            </a>
                            <a href="{{'/dashboard/item/'.$item->id.'/edit'}}" class="btn btn-info btn-pill">
                                <i class="fas fa-pencil-alt fa-fw"></i>
                            </a>
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-pill">
                                <i class="fas fa-trash fa-fw"></i>
                            </button>
                        </form>
                        
                    </div>
                </div>                
            </div>
        </div>   
    </div>
</div>
@endsection