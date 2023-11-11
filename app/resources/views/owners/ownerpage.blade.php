@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-around">
    <div>
        {{"出品商品一覧"}}
    </div>
    <div class="d-flex justify-content-around">
        <div >
            <a class="" href="{{ route('post_product')}}">{{"商品登録"}}</a>
        </div>
        <div>
            <a class="" href="{{ route('user_list')}}">{{"ユーザー確認"}}</a>
        </div>
    </div>
</div>
<div class="d-flex justify-content-around">
    <div>
        <div>{{"価格"}}</div>
        <div class="d-flex justify-content-around">
            <div>{{"下限"}}</div>
            <div>{{"～"}}</div>
            <div>{{"上限"}}</div>
        </div>
    </div>
    <div>
        <div>{{"キーワード"}}</div>
        <div class="d-flex justify-content-around">
            <div>{{"商品名・説明文から探す"}}</div>
            <div>{{"絞り込む"}}</div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-10 mx-auto d-flex justify-content-center">
@foreach($products as $product)
    @if(($product["del_flg"] === 0) && ($product["hidden_flg"]===0))
        <div class="col-md-3">
        <a class="" href="{{ route('edit_product',['product' => $product['id']]) }}">
            <div class="position-relative d-block mx-auto"><img class="d-block mx-auto" src="{{ asset('storage/'.$product['image']) }}" alt="商品画像" width="100" height="150" >
                <div class="card-img-overlay d-flex">
                    <div class="mt-auto ms-auto">
                        <img  src="{{asset('image/likes.png')}}" alt="いいね" width="40" height="40">
                    </div>
                </div>
            </div>
            <div>
                <div>{{$product["name"]}}</div>
                <div>{{$product["price"]}}</div>
            </div>
        </div>
    @endif
@endforeach
</div>
</div>

@endsection