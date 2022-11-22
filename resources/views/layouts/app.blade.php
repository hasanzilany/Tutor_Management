<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TuFi</title>
    <link rel="icon" href="{!! asset('/upload/logo/logo.png') !!}"/>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{asset('src/css/main.css')}}">

</head>
<body style="padding-top: 70px; ">
    <div id="app" class="">
        <nav class="navbar navbar-default navbar-fixed-top " ><!-- navbarcolor -->
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
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{!! asset('/upload/logo/logo.png') !!}" alt="logo" height="35px" width="60px">
                        
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <!-- <ul class="nav navbar-nav">
                        &nbsp;
                    </ul> -->

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <!-- top navbar user name and profile avatar -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" style="position:relative; padding-left:50px">
                                    <img src="/upload/avatar/{{ Auth::user()->avatar}}" style="width:32px; height:32px; position:absolute; top:10px;left:10px; border-radius:50%; margin-right:20px">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <!-- list of dropdown items in the top navbar like profile logout -->
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ url('/profile') }}" ><i class="fa fa-btn fa-user"></i>
                                            profile
                                        </a>
                                    </li>
                                    <li><a href="/home" >Home</a>
                                    </li>
                                    <li><a href="/search" >Search</a>
                                    </li>
                                    <li><a href="/setting" >Setting</a>
                                    </li>
                                    <li><a href="/help" >Help</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
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
        @guest
        <div class="col-md-9"  >
           @yield('content')
        </div>
        @else
        <!-- put sidebar from include folder sidebar file  -->
        <div class="col-md-3 " style="position:fixed">
            @include('include.sidebar')
        </div>
        <!-- put content from other files like profile home search etc. -->
        <div class="col-md-7 " id="content_margin"  >
           @yield('content')
        </div>
        @endguest



    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- scripts for search -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="js/index.js"></script>
    

    
</body>
</html>
