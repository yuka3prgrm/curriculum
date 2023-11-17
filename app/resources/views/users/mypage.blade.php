@extends('layouts.app')
@section('content')
{{ Auth::user()->name }}さん
<div><a class="" href="{{ route('edit_user',['user' => $user['id']]) }}">登録情報の変更</a></div>
<div><a class="" href="{{ route('ownerpage')}}">購入履歴</a></div>


@endsection