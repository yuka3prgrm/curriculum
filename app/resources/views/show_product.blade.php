@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-around">
    <div>
        <div><img src="{{asset('storage/'.$product['image'])}}" alt="商品画像"width="300" height="500" ></div>
    </div>
    <div>
        <div>{{$product->name}}</div>
        <div>{{$product->price}}</div>
        <div><a class="" href="#">カートに入れる</a></div>
        <div>{{$product->introduction}}</div>
    </div>
</div>
<div>
    <div><a class="" href="{{ route('edit_product',['product' => $product['id']]) }}">再編集する</a></div>
    <div><a class="" href="{{ route('ownerpage')}}">管理者ページへ戻る</a></div>
</div>

@endsection