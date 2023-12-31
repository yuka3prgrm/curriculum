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
    <script src="{{ asset('js/_ajaxlike.js') }}" defer></script>
    <script src="{{ asset('js/total.js') }}" defer></script>
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
                <a class="nav" href="{{ route('search_product') }}">
                    <img class="nav_img" src="{{asset('image/sarch.png')}}" alt="検索" width="20" height="20">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    
                    <ul class="navbar-nav ml-auto">
                        
<!--ログイン-->
                        @if(Auth::check())
                        <!--ログイン （管理者）-->
                            @if(Auth::user()->authority_flg == 0)
                                <div class="mr-3">{{"管理者ページ"}}</div>
                        <!--ログイン （管理者）-->
                        <!--ログイン （一般）-->
                            @else
                                <span class="my-navbar-item d-flex align-items-center"><a class="" href="{{ route('mypage',['user' => Auth::user()->id]) }}">{{ Auth::user()->name }}</a></span>
                                <!--カートの中身有無 -->
                                    @if(Auth::user()->orders()->where('status_id', 0)->count() >= 1)
                                    <a class="navbar-brand" href="{{ route('cart') }}">
                                        <img src="{{asset('image/fullcart.png')}}" alt="カート"width="35" height="35">
                                    </a>
                                    @else
                                    <a class="navbar-brand" href="{{ route('empty_cart') }}">
                                        <img src="{{asset('image/cart.png')}}" alt="カート"width="35" height="35">
                                    </a>
                                    @endif
                                <!--カートの中身有無 -->
                                <a class="navbar-brand" href="{{ route('mypage',['user' => Auth::user()->id]) }}">
                                    <img src="{{asset('image/like.png')}}" alt="いいね"width="30" height="30">
                                </a>
                            @endif
                        <!--ログイン （一般）-->
                            @auth
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="my-navbar-item d-flex align-items-center">ログアウト</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endauth
<!--ログイン -->
<!--未ログイン -->
                        @else
                        <div clss="d-flex align-items-center">
                            <a class="my-navbar-item" href="{{ route('login')}}">ログイン</a>
                        </div>
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
