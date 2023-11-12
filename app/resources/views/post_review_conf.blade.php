@extends('layouts.app')
@section('content')
レビュー投稿が完了しました

<div><a class="" href="{{ route('show_product',['product' => $product['id']]) }}">商品ページへ</a></div>
@endsection