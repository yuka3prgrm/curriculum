@extends('layouts.app')
@section('content')
<div class="container">
    <div class="h4 text-center">商品登録完了</div>
    <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <div class="text-right mr-5"><img class="text-right" src="{{ asset('storage/'.$product['image']) }}" alt="商品画像" width="200" height="400" ></div>
        </div>
        <div class="col-md-6">
            <div class="pl-3">
                <div class="mt-5 h4">{{$product->name}}</div>
                <div class="d-flex mt-3  align-items-end">
                    <div class="h2">￥{{$product->price}}</div>
                    <div class="h5">　税込</div>
                </div>
                <div class="mt-4 h4">在庫数　　{{$product->stock}}個</div>
                <div class="mt-5 h5">アイテム説明</div>
                <div class="h6">{{$product->introduction}}</div>
            </div>
        </div>
    </div>
    <div class="mt-3 d-flex justify-content-center">
        <a class="mr-3" href="{{ route('post_product')}}"><button type="submit" class="btn btn-dark">続けて追加する</button></a>

        <a class="ml-3" href="{{ route('ownerpage')}}"><button type="submit" class="btn btn-dark">管理者ページへ戻る</button></a>
    </div>
</div>

@endsection