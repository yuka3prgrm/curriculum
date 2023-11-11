@extends('layouts.app')
@section('content')
商品登録完了
<div>
    <div>
        <div><img src="{{ asset('storage/'.$product['image']) }}" alt="商品画像" width="100" height="150" ></div>
    </div>
    <div>
        <div>{{$product->name}}</div>
        <div>{{$product->price}}</div>
        <div>{{$product->stock}}</div>
        <div>{{$product->introduction}}</div>
    </div>
</div>
<div>
    <div><a class="" href="{{ route('post_product')}}">続けて追加する</a></div>

    <div><a class="" href="{{ route('ownerpage')}}">管理者ページへ戻る</a></div>
</div>

@endsection