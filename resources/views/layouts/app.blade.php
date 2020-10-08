<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <link rel="shortcut icon" type="image/ico" href="{{url('/mayacademy.ico')}}"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/index.css')}}">
    <link rel="stylesheet" href="{{url('css/contact.css')}}">
    <link rel="stylesheet" href="{{url('css/profile.css')}}">
    <link rel="stylesheet" href="{{url('css/mycart.css')}}">
    <link rel="stylesheet" href="{{url('css/login_register.css')}}">
    <title>MAYACADEMY - @yield('title')</title>
</head>
<body>
    <div id="app">
        <header>
            <p id="id_generate_user" class="hidden">{{$shoping_cart_id}}</p>
            <nav id="main-navbar" class="navbar navbar-default navbar-fixed-top">
                <div class="container navbar-container">
                    @if (Route::has('login'))
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand logo-cursos" href="{{ url('/') }}"><span class="l-maya">MAYA</span><span class="l-cademy">CADEMY</span></a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="{{ url('/') }}">Inicio</a></li>
                                <li>
                                    <a href="{{url('/mycart')}}">Mi Carrito
                                        <span class="circle-shopping-cart"><i class="fa fa-shopping-cart fa-lg"></i></span>
                                        <span style="background-color: #33b5e5" class="badge ml-2 mycartcircule">{{ $coursesCount }}</span>
                                    </a>
                                </li>
                                <li><a href="#about">Acerca del sitio</a></li>
                                <li><a href="{{route('contact')}}">Contacto</a></li>
                                @auth
                                    <li class="onli-small-screen nav-item avatar dropdown">
                                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" class="rounded-circle z-depth-0"
                                        alt="avatar image" height="35">
                                        </a>
                                        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                                        <a class="dropdown-item" href="#">Mi cuenta</a>
                                        <a class="dropdown-item" href="#">Mis cursos</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            {{ __('Salir') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        </div>
                                    </li>
                                @else 
                                <li class="onli-small-screen">
                                    <a class="estilo-log-regi" href="{{ route('login') }}">Iniciar Sesión</a> 
                                </li>
                                <li class="onli-small-screen">
                                    @if (Route::has('register'))
                                        <a class="estilo-log-regi" href="{{ route('register') }}">Regístrate</a>
                                    @endif
                                </li>
                                @endauth
                                <li class="onli-small-screen" ><a href="#"><i class="fab fa-twitter fa-lg"></i></a></li>
                                <li class="onli-small-screen"><a href="#"><i class="fab fa-facebook fa-lg"></i></a></li>
                            </ul>
                        </div>                     
                        <div class="top-social">
                            <ul id="top-social-menu">
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                @auth
                                    <li class="nav-item avatar dropdown">
                                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" class="rounded-circle z-depth-0"
                                        alt="avatar image" height="35">
                                        </a>
                                        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                                            <a class="dropdown-item" href="#">Mi cuenta</a>
                                            <a class="dropdown-item" href="#">Mis cursos</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                {{ __('Salir') }}
                                            </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                        </div>
                                    </li>
                                @else 
                                <li>
                                    <a class="estilo-log-regi" href="{{ route('login') }}">Iniciar Sesión</a> 
                                </li>
                                <li>
                                    @if (Route::has('register'))
                                        <a class="estilo-log-regi" href="{{ route('register') }}">Regístrate</a>
                                    @endif
                                </li>
                                @endauth
                            </ul>
                        </div>
                    @endif
                </div>
            </nav>
        </header>
        <main class="py-4">
            <section class="full-width-img">
                @yield('content')
                <footer>
                    <div class="container">
                        <div class="row">
                            <div class="col" style="margin-top: 40px">
                                <p class="text-center white-text">Copyright &#169; 2020 MAYACADEMY | Cursos Online | Asesoria Personalizada</p>
                            </div>
                        </div>
                    </div>
                </footer>
            </section>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- X-Editable -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
     <!-- Scripts -->
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{URL::asset('js/x_editable.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/mycart.js')}}"></script>
    <script>
        $(window).scroll(function () {
            var sc = $(window).scrollTop()
            if (sc > 50) {
                $("#main-navbar").addClass("navbar-scroll")
            } 
            else {
                $("#main-navbar").removeClass("navbar-scroll")
            }
            $('.fadedfx').each(function(){
            var imagePos = $(this).offset().top;

            var topOfWindow = $(window).scrollTop();
                if (imagePos < topOfWindow+500) {
                    $(this).addClass("fadeIn");
                }
            });
        });
    </script>
</body>
</html>
