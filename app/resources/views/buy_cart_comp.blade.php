@extends('layouts.app')
@section('content')
<div class="container">
    <div class="h4 text-center mt-5">お買い上げありがとうございます。</div>
    <div class="text-center">
        またのご利用をお待ちしております。
    </div>
    <div class="text-center mt-5">
      <a href="{{ url('/') }}">
          <button type="submit" class="btn btn-dark">メインページへ</button>
      </a>
    </div>
</div>

@endsection