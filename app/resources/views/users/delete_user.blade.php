@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('退会するユーザー') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('delete_user',['user' => $user['id']]) }}">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ユーザー名') }}</label>

                        <div class="col-md-6">
                            <div class="">{{$user->name}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>
                        <div class="col-md-6">
                            <div class="">{{$user->email}}</div>
                        </div>
                    </div>
                    <div class="text-center mb-3">本当に退会してよろしいですか？</div>
                    <div class="d-flex justify-content-center">
                        <div class="col-md-8 d-flex justify-content-around">
                            <div class=" ">
                                <button type="submit" class="btn btn-dark">
                                {{ __('　　退会する　　') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection