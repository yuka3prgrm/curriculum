@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <div class="text-right mr-5"><img src="{{asset('storage/'.$product['image'])}}" alt="商品画像" width="200" height="400" ></div>
        </div>
        <div class="col-md-6">
            <div class="pl-3">
                <div class="mt-5 h4">{{$product->name}}</div>
                <div class="d-flex mt-3  align-items-end">
                    <div class="h2">￥{{$product->price}}</div>
                    <div class="h5">　税込</div>
                </div>
                <form action="{{ route('add_cart',['product' => $product['id']])}}" method="post">
                    @csrf
                    <div class="mt-4">
                        <button type="submit" class="btn btn-dark">
                            {{ __('　　カートに入れる　　') }}
                        </button>
                    </div>
                </form>
                <div class="mt-5 h5">アイテム説明</div>
                <div class="h6">{{$product->introduction}}</div>
            </div>
        </div>
    </div>
    <div class="h4 mt-4 mb-4 text-center">この商品のレビュー</div>
    <div class="row justify-content-center mt-3">
    @foreach($reviews as $review)
            @if($review["del_flg"] === 0)
            <div class="mb-3 col-md-7 border border-secondary rounded">
                <div class="font-weight-bold mt-2">{{$review["title"]}}</div>
                <div>{{$review["comment"]}}</div>
                <div class="text-right mr-5 mb-2">投稿者：{{$review->user->name}}</div>
            </div>
            @endif
        @endforeach
    </div>
    <div class="text-center">
        <a  href="{{ route('post_review',['product' => $product['id']]) }}"><button type="submit" class="btn btn-dark">レビューを書く</button></a>
    </div>
</div>
@endsection