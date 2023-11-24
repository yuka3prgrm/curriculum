@extends('layouts.app')
@section('content')
<div class="container">
    <div class="ml-5 h4">ご注文内容</div>
    <div class="col-md-10 pr-5 d-flex justify-content-between">
        <div class="h5 ml-3">購入日時</div>
        <div class="h5">商品名</div>
        <div class="h5">単価(税込)</div>
        <div class="pr-5 h5">注文数</div>
    </div>

@foreach($orders as $order)
    <div class="col mb-4 bg-white">
        <div class=" d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-between align-items-center ml-4">
                    <div class="text-dark">{{$order->updated_at->format('Y-m-d')}}</div>
                    <img class="d-block mx-auto" src="{{ asset('storage/'.$order->product['image']) }}" alt="商品画像" width="80" height="160" >
                    <div class="text-dark ml-5">{{$order->product->name}}</div>
                </div>
                
                <div class="text-dark">{{$order->product->price}}円</div>
                <div class="text-dark">{{$order->amount}}</div>
                <div div class="text-center mr-3">
                    <div class="mb-1">
                        <a  href="{{ route('show_product',['product' => $order->product['id']]) }}"><button type="submit" class="btn btn-dark">{{ __('　　再購入　　') }}</button></a>
                    </div>
                    <div class="mt-1">
                        <a  href="{{ route('post_review',['product' => $order->product['id']]) }}"><button type="submit" class="btn btn-dark">レビューを書く</button></a>
                    </div>
                </div>
        </div>
        <div class="d-flex justify-content-end">
        <div class="col-md-8 d-flex justify-content-end">
            <div class="text-dark mr-3 font-weight-bold">{{"お届け先情報"}}</div>
            <div class="text-dark border-bottom mr-3">名前：{{$order->address->fullname}}</div>
            <div class="text-dark border-bottom mr-2">〒{{$order->address->postal_code}}</div>
            <div class="text-dark border-bottom mr-2">{{$order->address->place}}</div>
        </div>
    </div>
    </div>
@endforeach
</div>
@endsection