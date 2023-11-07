@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="col-md-5">
            <div class="mt-5">{{ __('ログイン') }}</div>
            <div class="card">
                

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <label for="email" class="col-md-4 col-form-label ">{{ __('メールアドレス') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="password" class="col-md-4 col-form-label ">{{ __('パスワード') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                        <div class="form-group row">
                            <div class="col-md-7 offset-md-7">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-11 d-flex justify-content-between ">
                                <div>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-secondary" href="{{ route('password.request') }}">
                                            {{ __('パスワードをお忘れのかた') }}
                                        </a>
                                    @endif
                                </div>
                                <div>                          
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('ログイン') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="pt-5"></div><div class="mt-3"></div>
            <div class="card ">
                
                <div class="card-body">
                <p class="font-weight-bold pb-4">初めてのお客様</p>
                <div>お得なお知らせが届きます</div>
                <div class="text-center pt-5 pb-5"><a href="{{ route('register') }}" class="btn btn-dark">新規メンバー登録</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
