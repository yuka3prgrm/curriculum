@extends('layouts.app')
@section('content')
<div class="text-center h4">商品登録ページ</div>
<form action="{{ route('product.store')}}" method="post" enctype="multipart/form-data">
@csrf
    <div class="form-group row">
        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('商品写真') }}</label>

        <div class="col-md-4">
            <input id="image" type="file"  name="image" value="{{ old('image') }}" required autocomplete="image">

            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('商品名') }}</label>

        <div class="col-md-4">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

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
            <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" required autocomplete="price">

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
            <input id="stock" type="text" class="form-control" name="stock" required autocomplete="stock">
        </div>
    </div>

    <div class="form-group row">
        <label for='introduction' class='col-md-4 col-form-label text-md-right'>{{ __('商品紹介文') }}</label>
        <div class="col-md-4">
            <textarea class='form-control' name='introduction'>{{ old('introduction')}}</textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="text-center">
            <button type="submit" class="btn btn-dark">
                {{ __('　　商品登録　　') }}
            </button>
        </div>
    </div>
</form>
@endsection