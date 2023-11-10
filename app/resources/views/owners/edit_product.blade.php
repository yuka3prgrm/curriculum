@extends('layouts.app')
@section('content')
商品編集ページ
<form action="{{ route('create_product')}}" method="post">
    <div class="form-group row">
        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('商品写真') }}</label>

        <div class="col-md-6">
            <input id="image" type="text" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ $products->image }}" required autocomplete="image" autofocus>

            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('商品名') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $products->name }}" required autocomplete="name">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('金額') }}</label>

        <div class="col-md-6">
            <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $products->price }}" required autocomplete="price">

            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('在庫数') }}</label>

        <div class="col-md-6">
            <input id="stock" type="text" class="form-control" name="stock" value="{{ $products->stock }}" required autocomplete="stock">
        </div>
    </div>

    <div class="form-group row">
        <label for='introduction' class='mt-2'>{{ __('商品紹介文') }}</label>
            <textarea class='form-control' name='introduction'>{{ $products->introduction}}</textarea>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-dark">
                {{ __('　　商品登録　　') }}
            </button>
        </div>
    </div>
</form>
@endsection