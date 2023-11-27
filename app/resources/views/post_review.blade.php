@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-center align-items-center">
        <div class="pr-5"><img src="{{asset('storage/'.$product['image'])}}" style="object-fit: cover;" alt="商品画像"width="80" height="160" ></div>
        <div class="pl-5 h4">{{$product->name}}</div>
    </div>
<div class="text-center pt-5 h5">{{"レビュー投稿"}}</div>
<form action="{{ route('post_review',['product' => $product['id']])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('タイトル') }}</label>

        <div class="col-md-4">
            <input id="title" type="text" class="form-control @error('name') is-invalid @enderror" name="title" required autocomplete="title">

            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for='comment' class='col-md-4 col-form-label text-md-right'>{{ __('コメント') }}</label>
        <div class="col-md-4">
            <textarea class='form-control' name='comment'></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="text-center">
            <button type="submit" class="btn btn-dark">
                {{ __('　　投稿　　') }}
            </button>
        </div>
    </div>
</form>
</div>
@endsection