@extends('layouts.app')
@section('content')
<div>
    <div>
        <div>{{$user->name}}</div>
        <div>{{$user->email}}</div>
    </div>
</div>
本当に退会してよろしいですか？
<div><a class="" href="{{ route('edit_user',['user' => $user['id']]) }}"><button type="submit" class="btn btn-dark">{{ __('　　編集画面へ戻る　　') }}</button></a></div>
<form action="{{ route('delete_user',['user' => $user['id']])}}" method="post">
    @csrf
    <div class="form-group">
        <div class="text-center">
            <button type="submit" class="btn btn-dark">
                {{ __('　　退会する　　') }}
            </button>
        </div>
    </div>
</form>

@endsection