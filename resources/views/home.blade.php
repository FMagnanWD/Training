@extends('layouts.front')

@section('title')
    Plateforme de formation en ligne
@endsection

@section('slogan')

    <div class="col-md-12" >
        <h1 class="slogan">Exchange cryptocurrency at the best rate</h1>
        <p>Transfer from one wallet to another within seconds. It's that simple.</p>
    </div>

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="">
                <div class="form-group col-md-5">
                    <input type="text" class="form-control" id="baseCurrencies">
                </div>
                <div class=" col-md-2 text-center">
                     <i class="fa fa-exchange fa-2x" style="color: #FFFFFF;" aria-hidden="true"></i>
                </div>
                <div class="form-group col-md-5">
                    <input id="gettingCurrencies" type="text" class="form-control" placeholder="@if($total != ""){{$total}} @endif">
                </div>
            </form>
        </div>
    </div>
@endsection

