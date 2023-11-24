@extends('layouts.app')
@section('content')
<?php
$subtotal=0;
foreach($orders as $order){
     $subtotal = $subtotal + (($order->product->price)*($order["amount"]));
}
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('お届け先情報') }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-4 text-md-right">{{ __('氏名:') }}</div>
                            <div class="col-md-6 border-bottom">
                                <div class="">{{$address->fullname}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 text-md-right">{{ __('郵便番号:') }}</div>
                            <div class="col-md-6 border-bottom">
                                <div class="">{{$address->postal_code}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 text-md-right">{{ __('住所:') }}</div>
                            <div class="col-md-6 border-bottom">
                                <div class="">{{$address->place}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 text-md-right">{{ __('電話番号:') }}</div>
                            <div class="col-md-6 border-bottom">
                                <div class="">{{$address->tel}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="text-right"><a class="" href="{{ route('post_address')}}">▶▶お届け先変更</a></div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-end">
                <div class="col-md-8">
                @foreach($orders as $order)
                    <div class="mt-2 bg-white">
                            <div class="d-flex justify-content-between align-items-center ml-4">
                                <img class="d-block" src="{{ asset('storage/'.$order->product['image']) }}" alt="商品画像" width="80" height="160" >
                                <div class="text-dark">{{$order->product->name}}</div>
                                <div class="text-dark mr-3">{{$order->amount}}</div>
                            </div>
                    </div>
                @endforeach
                </div>
                <div class="h4" >
                    <div class=" mb-3 h4 ">
                        <div class="d-flex ">合計<p>{{$subtotal}}</p>円</div>
                    </div>
                    <form action="{{ route('address')}}" method="post">
                        @csrf
                        <div class="mt-4">
                            <button type="submit" class="btn btn-dark">
                                {{ __('　　ご注文内容確定へ　　') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection