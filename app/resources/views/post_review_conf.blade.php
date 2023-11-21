@extends('layouts.app')
@section('content')
<div class="container">
    <div class="h4 text-center mt-5">レビュー投稿が完了しました</div>
    <div class="text-center"><a class="" href="{{ route('show_product',['product' => $product['id']]) }}">
        <button type="submit" class="btn btn-dark">商品ページへ</button>
    </a></div>
</div>
@endsection