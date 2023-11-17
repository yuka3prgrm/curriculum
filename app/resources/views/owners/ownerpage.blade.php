@extends('layouts.app')
@section('content')
<div class="container">
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
<div class="row row-cols-4 mr-5 ml-5">
@foreach($products as $product)
    @if(($product["del_flg"] === 0) && ($product["hidden_flg"]===0))
    <div class="col mb-4">
        <div class="border border-secondary rounded">
            <a class="" href="{{ route('edit_product',['product' => $product['id']]) }}">
                <div class="position-relative d-block mx-auto">
                    <img class="d-block mx-auto" src="{{ asset('storage/'.$product['image']) }}" alt="商品画像" width="120" height="240" >
                </div>
                <div class="">
                    <div class="ml-3">
                        <div class="text-dark">{{$product["name"]}}</div>
                        <div class="text-dark">{{$product["price"]}}円</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
@endforeach

</div>
</div>
@endsection