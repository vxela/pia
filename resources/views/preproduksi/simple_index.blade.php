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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus cursus maximus lacus vel ullamcorper. Duis euismod, risus vel faucibus imperdiet, nisl massa congue dolor, ut mollis lacus tortor eget velit. Nam non urna risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis metus orci, consectetur sed risus at, accumsan imperdiet elit. Nullam semper finibus lacus nec volutpat. Fusce convallis nulla ipsum, et hendrerit elit feugiat non. Vivamus aliquet purus non euismod mattis. Aliquam dui dui, dapibus ac lobortis nec, egestas id nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In iaculis nulla nulla, id facilisis metus interdum dignissim. In efficitur ornare ipsum, sit amet facilisis tellus. Vestibulum porta a leo eget iaculis. Etiam nec nulla et ex tincidunt pretium.</p>
    
                        <p>Praesent ligula libero, cursus a est vel, venenatis bibendum tortor. Ut non lobortis nunc. Duis sed elit blandit, ullamcorper turpis vitae, convallis mauris. Nullam tempor eget tortor id condimentum. Integer sollicitudin, orci quis rhoncus convallis, dolor urna consectetur justo, vitae dignissim erat dui ut felis. Etiam egestas, nunc quis semper facilisis, mi lectus porttitor dolor, nec tincidunt ex ipsum quis neque. Curabitur urna sem, interdum id elit non, dapibus pharetra ipsum. Nunc imperdiet elit nulla, quis tincidunt turpis condimentum ut. Ut feugiat enim elit, sit amet semper risus tincidunt nec. Mauris efficitur sem non turpis dictum, tincidunt placerat nibh lobortis.</p>
    
                        <p>Integer ante turpis, ornare in velit non, laoreet porttitor orci. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum id felis iaculis, pulvinar quam sit amet, blandit turpis. In volutpat, est sed tristique mattis, nunc nulla sodales tortor, nec dignissim felis arcu quis magna. Donec eget odio risus. Etiam egestas enim ut diam molestie, in lacinia justo dapibus. Suspendisse sodales id tortor at varius. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In sed egestas lorem. Quisque ultricies, tellus a commodo iaculis, neque nisl tristique lacus, nec sodales velit elit ac sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque at euismod nisl. Donec finibus urna congue erat congue, eget suscipit augue ornare. Donec libero tortor, vestibulum in leo sit amet, fermentum dignissim risus. Praesent a felis vitae tortor facilisis tempus.</p>
    
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus auctor, ipsum ac vestibulum tincidunt, tellus risus tincidunt mi, ut lobortis lacus libero ac nulla. Nam ac auctor nibh. Ut lacinia dictum dui. Etiam at pharetra elit. Vestibulum egestas metus quis purus pretium interdum. Etiam eu erat facilisis, vestibulum lectus eu, imperdiet eros.</p>
    
                        <p>Donec at enim at mi luctus viverra ut vehicula odio. Nam faucibus dui diam, quis fringilla lacus dapibus vitae. Duis tincidunt neque ultrices fringilla aliquet. Duis mauris dui, feugiat quis ullamcorper non, euismod nec sem. Fusce fringilla diam turpis, eu interdum diam euismod sit amet. Aliquam lacinia rhoncus arcu, consequat porttitor felis vestibulum in. Fusce volutpat ultricies ligula ac imperdiet.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection