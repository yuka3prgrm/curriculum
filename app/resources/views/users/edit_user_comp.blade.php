@extends('layouts.app')
@section('content')
編集完了
<div>
    <div>
        <div>{{$user->name}}</div>
        <div>{{$user->email}}</div>
    </div>
</div>
<div>
    <div><a class="" href="{{ route('edit_user',['user' => $user['id']]) }}">編集画面に戻る</a></div>
    <div><a class="" href="{{ route('mypage')}}">マイページへ戻る</a></div>
</div>

@endsection