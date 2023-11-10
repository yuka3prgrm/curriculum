@extends('layouts.app')
@section('content')
<div>
    <div>
        <div>
        出品商品一覧
        </div>
    </div>
    <div>
        <div>
        <a class="" href="{{ route('post_product')}}">商品登録</a>
        </div>
        <div>
        <a class="" href="{{ route('user_list')}}">ユーザー確認</a>
        </div>
    </div>
</div>
<div>
    <div>
        <div>価格</div>
        <div>
            <div>下限</div>
            <div>～</div>
            <div>上限</div>
        </div>
    </div>
    <div>キーワード</div>
    <div>
        <div>商品名・説明文から探す</div>
        <div>絞り込む</div>
    </div>
</div>

@endsection