<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    ECサイト
                </a>
                <a class="nav" href="{{ url('/') }}">
                    <img class="nav_img" src="{{asset('image/sarch.png')}}" alt="検索" width="20" height="20">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <!-- @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest -->
<!--ログイン （未完成）-->
                        @if(Auth::check())
                        <!--ログイン （管理者）-->
                            @if(Auth::user()->authority_flg == 0)
                                {{管理者ページ}}
                        <!--ログイン （管理者）-->
                        <!--ログイン （一般）-->
                            @else
                                <span class="my-navbar-item">{{ Auth::user()->name }}</span>
                                <!--カートの中身有無 -->
                                    <a class="navbar-brand" href="{{ url('/') }}">
                                        <img src="{{asset('image/fullcart.png')}}" alt="カート"width="35" height="35">
                                    </a>
                                    <a class="navbar-brand" href="{{ url('/') }}">
                                        <img src="{{asset('image/cart.png')}}" alt="カート"width="35" height="35">
                                    </a>
                                <!--カートの中身有無 -->
                                <a class="navbar-brand" href="{{ url('/') }}">
                                    <img src="{{asset('image/like.png')}}" alt="いいね"width="30" height="30">
                                </a>
                            @endif
                        <!--ログイン （一般）-->
                            @auth
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="my-navbar-item">ログアウト</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endauth
<!--ログイン -->
<!--未ログイン -->
                        @else
                            <a class="my-navbar-item" href="{{ route('login')}}">ログイン</a>
                        @endif
<!--未ログイン -->
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
