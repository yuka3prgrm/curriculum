@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('編集完了') }}</div>
                <div class="card-body">
                
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ユーザー名') }}</label>

                        <div class="col-md-6 border-bottom">
                            <div class="">{{$user->name}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>
                        <div class="col-md-6 border-bottom">
                            <div class="">{{$user->email}}</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="col-md-8 d-flex justify-content-around">
                            <div class="d-flex">
                            <div><a class="" href="{{ route('edit_user',['user' =>  Auth::user()->id]) }}"><button type="submit" class="btn btn-dark">編集画面に戻る</button></a></div>
                            <div><a class="" href="{{ route('mypage',['user' => Auth::user()->id])}}"><button type="submit" class="ml-3 btn btn-dark">マイページへ戻る</button></a></div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>

@endsection