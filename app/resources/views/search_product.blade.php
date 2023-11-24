@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card-body">
        <form action="{{ route('search_product')}}" class="d-flex justify-content-end" method="GET">
            @csrf
            <div class="col-md-3">
                <select class='form-control' name='limit' value="{{ $limit}}">
                    <option value='0' @if(old('limit', $limit) == 0) selected @endif>選択してください</option>
                    <option value='1' @if(old('limit', $limit) == 1) selected @endif>0 ~ 1000 円</option>
                    <option value='2' @if(old('limit', $limit) == 2) selected @endif>1000 ~ 3000 円</option>
                    <option value='3' @if(old('limit', $limit) == 3) selected @endif>3000 ~ 5000 円</option>
                    <option value='4' @if(old('limit', $limit) == 4) selected @endif>5000 ~ 10000 円</option>
                </select>
            </div>
            <div class="col-md-3"><input type='text' class='form-control' name='keyword' value="{{ $keyword}}"/></div>
            <input type="submit" class="btn btn-dark" value="絞り込む">
        </form>
    </div>
    <div class="row  row-cols-4 mr-5 ml-5 row-eq-height mb-5">
        @foreach($products as $product)
            @if(($product["del_flg"] === 0) && ($product["hidden_flg"]===0))
            <div class="col mb-4 ">
                <div class="bg-white shadow p-3  bg-body-tertiary rounded h-100 position-relative ">
                    <a class="" href="{{ route('show_product',['product' => $product['id']]) }}">
                        <div class="mx-auto" style="max-width: 120px;">
                                <img class="card-img d-block mx-auto" src="{{ asset('storage/'.$product['image']) }}" alt="商品画像" width="120" height="240" >
                                @if($product->orders->sum('amount') > $product->stock) 
                                <img class=" mt-3 card-img-overlay mx-auto" src="{{ asset('image/soldout.png') }}" alt="商品画像" width="160" height="240" >
                                @endif
                            </div>
                        <div class="ml-3 mb-4">
                            <div class="text-dark">{{$product["name"]}}</div>
                            <div class="text-dark">{{$product["price"]}}円</div>
                        </div>
                        <div class="position-absolute" style="bottom: 0; right: 0;">
                        @if(Auth::check())
                            @if($like_model->like_exist(Auth::user()->id,$product->id))
                                <p class="favorite-marke mr-3">
                                    <a class="js-like-toggle liked h1" data-productid="{{ $product->id }}" >
                                        ❤
                                        <!-- <img src="{{asset('image/liked.png')}}" alt="Liked" width="40" height="40"> -->
                                    </a>
                                </p>
                            @else
                            <p class="favorite-marke mr-3">
                                <a class="js-like-toggle unliked h1" data-productid="{{ $product->id }}">
                                    ❤
                                    <!-- <img src="{{asset('image/likes.png')}}" alt="Like" width="40" height="40"> -->
                                </a>
                            </p>
                            @endif
                        @endif
                        </div>
                    </a>
                </div>
            </div>
            @endif
        @endforeach
    </div>
    <div class="d-flex justify-content-center">{{ $products->appends(['keyword' => $keyword, 'limit' => $limit])->links() }}</div>
</div>
@endsection