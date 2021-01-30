<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyShop') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm" style="background-color:#0092b3; color:#fefefe;">
            <div class="container">

                <a class=" navbar-brand" style="color:#fefefe; font-size:1.4em" href="{{ url('home') }}">
                    {{ config('app.name', 'MyShop') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="header-list" style="list-style: none;">
                        <ul>
                            <li>MyShopとは</li>
                            <li>売れ筋商品</li>
                            <li>お問い合わせ</li>
                        </ul>
                    </div>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" style="color:#fefefe;" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" style="color:#fefefe;"
                                        href="{{ route('register') }}">{{ __('会員登録') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="color:#fefefe;" class="nav-link dropdown-toggle" href="#"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                   document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>

                                    {{-- 追加 --}}
                                    <a class="dropdown-item" href="{{ url('guest/mycart') }}">
                                        カートを見る
                                    </a>
                                </div>
                            </li>
                            {{-- 追加 --}}
                            <a href="{{ url('guest/mycart') }}">
                                <img src="{{ asset('image/cart.png') }}" class="cart">
                            </a>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <footer class="footer_design">
            @guest
                <p class="nav-item" style="display:inline;"></p>
                <a class="nav-link" href="{{ route('login') }}" style="color:#fefefe; display:inline;">{{ __('ログイン') }}</a>
                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}"
                        style="color:#fefefe; display:inline;">{{ __('会員登録') }}</a>
                @endif
            @endguest
            <div style="margin-top:24px;">
                <p style="font-size:2.4em">MyShop</p><br>
            </div>
        </footer>
    </div>
    {{-- @stack('scripts') --}}
</body>

</html>
