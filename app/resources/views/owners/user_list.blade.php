@extends('layouts.app')
@section('content')
<div class="container">
    <div class="h4">
        {{"ユーザー一覧"}}
    </div>
    <div class="card-body">
        <form action="{{ route('user_list') }}" class="d-flex justify-content-end" method="GET">
            <div class="col-md-5"><input type='text' class='form-control' name='keyword' value="{{ $keyword}}"/></div>
            <input type="submit" class="btn btn-dark" value="絞り込む">
        </form>
    </div>
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
<div class="d-flex justify-content-center">{{ $users->links() }}</div>
<div class="text-right"><a class="ml-3" href="{{ route('ownerpage')}}"><button type="submit" class="btn btn-dark">管理者ページへ戻る</button></a></div>
</div>
@endsection