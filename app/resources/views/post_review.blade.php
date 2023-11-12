@extends('layouts.app')
@section('content')
<div><img src="{{asset('storage/'.$product['image'])}}" alt="商品画像"width="300" height="500" ></div>
<div>{{$product->name}}</div>
<div>{{"レビュー投稿"}}</div>
<form action="{{ route('post_review')}}" method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('タイトル') }}</label>

        <div class="col-md-4">
            <input id="title" type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="{{ 'タイトル入力' }}" required autocomplete="title">

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
            <textarea class='form-control' name='comment'>{{ 'コメント入力'}}</textarea>
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

@endsection