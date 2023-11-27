@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 h4">
        {{"商品編集ページ"}}
    </div>
</div>
<form action="{{ route('product.update', ['product' => $product->id])}}" method="post">
@csrf
@method('PUT')
    <div class="form-group row">
        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('商品写真') }}</label>
        <img class="d-block ml-5" src="{{ asset('storage/'.$product['image']) }}" style="object-fit: cover;"  alt="商品画像" width="80" height="160" >
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('商品名') }}</label>

        <div class="col-md-4">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required autocomplete="name">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('金額') }}</label>

        <div class="col-md-4">
            <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" required autocomplete="price">

            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('在庫数') }}</label>

        <div class="col-md-4">
            <input id="stock" type="text" class="form-control" name="stock" value="{{ $product->stock }}" required autocomplete="stock">
        </div>
    </div>

    <div class="form-group row">
        <label for='introduction' class='col-md-4 col-form-label text-md-right'>{{ __('商品紹介文') }}</label>
        <div class="col-md-4">
            <textarea class='form-control' name='introduction'>{{ $product->introduction}}</textarea>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-center align-items-center">
                <button type="submit" class="btn ml-5 btn-dark">
                            {{ __('　　商品編集　　') }}
                </button>
</form>
                @if($product["hidden_flg"] === 0)
                    <form action="{{ route('hidden_product',['product' => $product['id']])}}" method="post">
                        @csrf
                        <div class="">
                            <button type="submit" class="ml-5 btn btn-dark">
                                {{ __('　　出品停止　　') }}
                            </button>
                        </div>
                    </form>
                @elseif($product["hidden_flg"] === 1)
                    <form action="{{ route('hidden_product2',['product' => $product['id']])}}" method="post">
                        @csrf
                        <div class="">
                            <button type="submit" class="ml-5 btn btn-dark">
                                {{ __('　　出品再開　　') }}
                            </button>
                        </div>
                    </form>
                @endif
                <form action="{{ route('product.destroy', ['product' => $product->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="">
                        <button type="submit" class="ml-5 btn btn-dark">
                            {{ __('　　商品削除　　') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection