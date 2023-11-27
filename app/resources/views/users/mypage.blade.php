@extends('layouts.app')
@section('content')
<div class="container">
<div class="d-flex justify-content-between">
    <div class="ml-5 h4">{{ Auth::user()->name }}さん</div>
    <div class="d-flex justify-content-around">
        <div class="mr-5"><a class="mr-5" href="{{ route('edit_user',['user' => $user['id']]) }}"><button type="submit" class="btn btn-dark">登録情報の変更</button></a></div>
        <div class="mr-5"><a class="mr-5" href="{{ route('order_list')}}"><button type="submit" class="btn btn-dark">購入履歴</button></a></div>
    </div>
</div>
<div class="h4 ml-5 mt-4 mb-4">お気に入りリスト</div>
<div class="row  row-cols-4 mr-5 ml-5 row-eq-height mb-5">
@foreach($likes as $like)
    <div class="col mb-4">
        <div class="bg-white shadow p-3  bg-body-tertiary rounded h-100 position-relative ">
            <a class="" href="{{ route('show_product',['product' => $like->product->id]) }}">
                <div class="position-relative d-block mx-auto">
                    <img class="d-block mx-auto" style="object-fit: cover;" src="{{ asset('storage/'.$like->product['image']) }}" alt="商品画像" width="120" height="240" >
                    @if($like->product->orders->where('status_id', 2)->sum('amount') >= ($like->product->stock))
                        <img class=" mt-3 card-img-overlay mx-auto" src="{{ asset('image/soldout.png') }}" alt="商品画像" width="160" height="240" >
                    @endif
                </div>
                <div class="ml-3 mb-3">
                    <div class="text-dark">{{$like->product->name}}</div>
                    <div class="text-dark align-items-center">{{$like->product->price}}円</div>
                </div>
            </a>
            <div class="position-absolute" style="bottom: 0; right: 0;">
                <form action="{{ route('delete_like',['like' => $like['id']]) }}" method="post">
                @csrf

                <button type="submit" class="" style="text-decoration: none; color: red; cursor: pointer; border: none; background: none;"><p class="h1 mt-5"  >❤</p></button>
                </form>
            </div>
        </div>
    </div>
@endforeach
</div>
<div>
@endsection