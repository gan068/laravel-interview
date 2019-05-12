<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <div class="navbar-brand" role="navigation">
                        {{ config('app.name', 'Blog') }}
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">@lang('view.Login')</a></li>
                            <li><a href="{{ route('register') }}">@lang('view.Register')</a></li>
                        @else
                            <li class="{{ Request::is('article/create') ? 'active' : '' }}"><a href="{{ url('article/create') }}">@lang('view.New Article')</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span class="glyphicon glyphicon-log-out"></span>
                                            @lang('view.Logout')
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <!-- <div class="alert alert-danger">必填</div> -->
                @if (session('error_msg'))
                <div class="alert alert-danger">
                    {!! session('error_msg') !!}
                </div>
                @elseif (session('success_msg'))
                <div class="alert alert-info">
                    {!! session('success_msg') !!}
                </div>
                @elseif (session('msg'))
                <div class="alert alert-warning">
                    {!! session('msg') !!}
                </div>
                @endif
                
                @yield('content')
                
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
