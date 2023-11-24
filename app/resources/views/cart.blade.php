@extends('layouts.app')
@section('content')
<div class="container">
<div class="ml-3 h4">ご注文内容</div>
<div class="d-flex justify-content-around">
    <div class="ml-5 h5">商品名</div>
    <div class="ml-5 h5">単価(税込)</div>
    <div class="ml-3 h5">注文数</div>
    <div class="ml-3 h5">小計(税込)</div>
</div>
@foreach($orders as $order)
    <div class="col mb-4">
        <div class="bg-white d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-between align-items-center ml-4">
                    <img class="d-block mx-auto" src="{{ asset('storage/'.$order->product['image']) }}" alt="商品画像" width="80" height="160" >
                    <div class="text-dark ml-5">{{$order->product->name}}</div>
                </div>
                
                <div class="text-dark">{{$order->product->price}}円</div>
                <div class="text-dark">{{$order["amount"]}}</div>
                <div class="text-dark" id="subtotal">{{($order->product->price)*($order["amount"]) }}円</div>
                <div class="text-dark mr-3">
                    <form action="{{ route('del_cart',['order' => $order['id']])}}" method="post">
                    @csrf
                        <button type="submit" class="btn btn-dark">削除</button>
                    </form>
                </div>
        </div>
    </div>
@endforeach
<?php
$subtotal=0;
foreach($orders as $order){
     $subtotal = $subtotal + (($order->product->price)*($order["amount"]));
}
?>
<div class="ml-3 h4 d-flex justify-content-around">
    <div class="ml-5 h4 d-flex align-items-center">合計
        <div>
            {{$subtotal}}
        </div>円
    </div>
        <div class="d-flex align-items-center">
            <div><a class="" href="{{ route('search_product') }}"><button type="submit" class="btn btn-dark">{{ __('　　買い物を続ける　　') }}</button></a></div>
            <div><a class="ml-3" href="{{ route('address') }}"><button type="submit" class="btn btn-dark">{{ __('　　購入手続き　　') }}</button></a></div>
        </div>
    </div>
</div>


@endsection