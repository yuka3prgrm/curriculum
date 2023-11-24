@extends('layouts.app')
@section('content')
<div class="container">
    <div class="h4 text-center mt-5">不正なアクセスです</div>
    <div class="text-center mt-5">
      <a href="{{ url('/') }}">
          <button type="submit" class="btn btn-dark">トップページへ戻る</button>
      </a>
    </div>
</div>
@endsection
