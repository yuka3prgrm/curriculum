@extends('layouts.app')
@section('content')
<div class="container">
    <div class="h4">
        {{"ユーザー一覧"}}
    </div>
    <div class="card-body">
        <form action="{{ route('user_list') }}" class="d-flex justify-content-end" method="GET">
            <div class="col-md-4"><input type='text' class='form-control' name='keyword' value="{{ $keyword}}"/></div>
            <div class="col-md-3">
                <select class='form-control' name='sort' value="{{ $sort}}">
                    <option value='0' @if(old('sort', $sort) == 0) selected @endif>登録昇順</option>
                    <option value='1' @if(old('sort', $sort) == 1) selected @endif>登録降順</option>
                    <option value='2' @if(old('sort', $sort) == 2) selected @endif>更新昇順</option>
                    <option value='3' @if(old('sort', $sort) == 3) selected @endif>更新降順</option>
                    <option value='4' @if(old('sort', $sort) == 4) selected @endif>現会員先</option>
                    <option value='5' @if(old('sort', $sort) == 5) selected @endif>退会者先</option>
                </select>
            </div>
            <input type="submit" class="btn btn-dark" value="並び替え">
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
<div class="d-flex justify-content-center">{{ $users->appends(['keyword' => $keyword, 'sort' => $sort])->links() }}</div>
<div class="text-right"><a class="ml-3" href="{{ route('ownerpage')}}"><button type="submit" class="btn btn-dark">管理者ページへ戻る</button></a></div>
</div>
@endsection