<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> DabasVeltes.me </title>

    <script rel="prefetch" src="//maps.googleapis.com/maps/api/js?v=3&key=AIzaSyDijoofslQcBR-b7RL-H3utJ78N8GXVb6E&libraries=places"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/plugins.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jqueryUI/jquery-ui.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/SMALL-07.png') }}" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('nav.toggle_navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                            <li class="nav-item">
                                <button class="col-sm-12 btn btn-green">
                                    <a href="{{ url('user/grower') }}">
                                        @if(\Illuminate\Support\Facades\Auth::user()->group === \App\Helpers\UserGroups::GROWER || \Illuminate\Support\Facades\Auth::user()->group === \App\Helpers\UserGroups::FARMER )
                                            {{ __('nav.grower_profile') }}
                                        @else
                                            {{ __('nav.grower_profile_not_grower') }}
                                        @endif
                                    </a>
                                </button>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/product') }}">{{ __('nav.product_list') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('user/subscriptions') }}">{{ __('nav.subscriptions') }}</a>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('auth.login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('auth.register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item {{--d-block d-sm-none--}}">
                                <a id="notificationsDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <div class="glyphicon glyphicon-bell"></div>
                                    @if(\App\Helpers\NotificationHelper::countUnreadNotifications())
                                        <span style="margin-left: 6px;" class="badge badge-danger notification-count">{{ \App\Helpers\NotificationHelper::countUnreadNotifications() }}</span>
                                    @endif
                                </a>

                                <div class="dropdown-menu notifications dropdown-menu-right col-md-4" aria-labelledby="notificationsDropdown">
                                    <ul class="notification-list list-unstyled"><img class="loading center-block" src="{{ asset('images/loading.gif') }}"></ul>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('nav.profile') }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('user/'.Auth::id().'/edit') }}">{{ __('nav.edit') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('nav.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    @yield('scripts')
</body>
</html>
