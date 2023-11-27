@extends('layouts.app')
@section('content')
<div class="container">
<div class="d-flex justify-content-around">
    <div class="h4">
        {{"出品商品一覧"}}
    </div>
    <div class="d-flex justify-content-around">
        <div >
            <a class="" href="{{'product/create'}}">
            <button type="submit" class="btn btn-dark">{{"商品登録"}}</button>
            </a>
        </div>
        <div>
            <a class="ml-3" href="{{ route('user_list')}}">
            <button type="submit" class="btn btn-dark">{{"ユーザー確認"}}</button>
            </a>
        </div>
        <div>
            <a class="ml-3" href="{{ route('owner_order_list')}}">
            <button type="submit" class="btn btn-dark">{{"売上確認"}}</button>
            </a>
        </div>
    </div>
</div>
<div class="card-body">
    <form action="{{ route('ownerpage')}}" class="d-flex justify-content-end" method="GET">
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
    @if($product["del_flg"] === 0)
        @if($product["hidden_flg"] === 0)
        <div class="col mb-4">
            <div class="bg-white shadow p-3  bg-body-tertiary rounded h-100 position-relative ">
                <a class="" href="{{ '/product/' . $product->id . '/edit' }}">
                    <div class="mx-auto">
                        <img class="d-block mx-auto " style="object-fit: cover;" src="{{ asset('storage/'.$product['image']) }}" alt="商品画像" width="120" height="240" >
                        @if($product->orders->where('status_id', 2)->sum('amount') >= ($product->stock)) 
                            <img class=" mt-3 card-img-overlay mx-auto" src="{{ asset('image/soldout.png') }}" alt="商品画像" width="160" height="240" >
                        @endif
                    </div>
                    <div class="ml-3 mb-4">
                        <div class="text-dark">{{$product["name"]}}</div>
                        <div class="text-dark">{{$product["price"]}}円</div>
                    </div>
                </a>
            </div>
        </div>
        @elseif($product["hidden_flg"] === 1)
        <div class="col mb-4">
            <div class="bg-white shadow p-3  bg-body-tertiary rounded h-100 position-relative ">
                <a class="" href="{{ '/product/' . $product->id . '/edit' }}">
                    <div class="mx-auto" style="max-width: 120px;">
                        <img class="card-img d-block mx-auto " style="object-fit: cover;"  src="{{ asset('storage/'.$product['image']) }}" alt="商品画像" width="120" height="240" >
                        <img class=" mt-3 card-img-overlay mx-auto" src="{{ asset('image/hidden.png') }}" alt="商品画像" width="160" height="240" >
                    </div>
                    <div class="ml-3 mb-4">
                        <div class="text-dark">{{$product["name"]}}</div>
                        <div class="text-dark">{{$product["price"]}}円</div>
                    </div>
                </a>
            </div>
        </div>
        @endif
    @endif
@endforeach


</div>
<div class="d-flex justify-content-center">{{ $products->appends(['keyword' => $keyword, 'limit' => $limit])->links() }}</div>
</div>
@endsection