@extends('layouts.app')
@section('content')
商品編集ページ
<form action="{{ route('edit_product',['product' => $product['id']])}}" method="post">
@csrf
    <div class="form-group row">
        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('商品写真') }}</label>

        <div class="col-md-6">
            <input id="image" type="file" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>

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

        <div class="col-md-6">
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

        <div class="col-md-6">
            <input id="stock" type="text" class="form-control" name="stock" value="{{ $product->stock }}" required autocomplete="stock">
        </div>
    </div>

    <div class="form-group row">
        <label for='introduction' class='col-md-4 col-form-label text-md-right'>{{ __('商品紹介文') }}</label>
        <div class="col-md-4">
            <textarea class='form-control' name='introduction'>{{ $product->introduction}}</textarea>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-dark">
                {{ __('　　商品編集　　') }}
            </button>
        </div>
    </div>
</form>
@endsection