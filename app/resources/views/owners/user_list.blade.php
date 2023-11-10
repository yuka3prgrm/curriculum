@extends('layouts.app')
@section('content')
ユーザー一覧
<table class='table'>
    <tr>
        <th scope='col'>ユーザーID</th>
        <th scope='col'>ユーザー名</th>
        <th scope='col'>メールアドレス</th>
        <th scope='col'>ステータス</th>
        <th scope='col'>作成日</th>
        <th scope='col'>更新日</th>
    </tr>
    @foreach($users as $user)
        <tr>
            <td scope="col">{{$user["id"]}}</td>
            <td scope="col">{{$user["name"]}}</td>
            <td scope="col">{{$user["email"]}}</td>
            @if($user["del_flg"] == 0)
            <td scope="col">{{"在籍"}}</td>
            @else
            <td scope="col">{{"退会"}}</td>
            @endif
            <td scope="col">{{$user["created_at"]}}</td>
            <td scope="col">{{$user["updated_at"]}}</td>
        </tr>
    @endforeach
</table>
@endsection