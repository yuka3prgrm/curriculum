@extends('layouts.app')
@section('content')
商品編集完了
<div>
    <div>
        <div><img src="{{$product->image)}}" alt="商品画像" width="100%" ></div>
    </div>
    <div>
        <div>{{$product->name}}</div>
        <div>{{$product->price}}</div>
        <div>{{$product->stock}}</div>
        <div>{{$product->introduction}}</div>
    </div>
</div>
<div>
    <div><a class="" href="{{ route('route('edit_product',['products' => $products['id']])')}}">再編集する</a></div>
    <div><a class="" href="{{ route('ownerpage')}}">管理者ページへ戻る</a></div>
</div>

@endsection