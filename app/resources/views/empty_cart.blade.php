@extends('layouts.app')
@section('content')
<div class="container">
    <div class="h4 text-center mt-5">買い物かごには商品が入っていません。</div>
    <div class="text-center">
        現在、買い物かごには商品が入っていません。ぜひお買い物をお楽しみください。</br>
        ご利用をお待ちしております。
    </div>
    <div class="text-center">
      <a href="{{ url('/') }}">
          <button type="submit" class="btn btn-dark">トップページへ</button>
      </a>
    </div>
</div>
@endsection