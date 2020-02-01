<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AFA') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/agri.js') }}" defer></script>
    <script src="{{ asset('js/scripts.min.js') }}" defer></script>
    <script src="{{ asset('js/scripts.order-2.min.js') }}" defer></script>
    <script src="{{ asset('js/min/main.min.js') }}" defer></script>
    <script src="{{ asset('js/min/order-2.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.blue.css') }}" rel="stylesheet">
    <link href="{{ asset('css/order-2.blue.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.blue.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('css/datatables/responsive.dataTables.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('css/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="{{ asset('css/datepicker/datepicker.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" style="padding-top: 0px;">
        <!-- Preloader -->
        <div class="preloader"></div>

        <!-- Navbar -->
        <header class="header">
            @auth
            <nav class="navbar navbar-expand-lg fixed-top">
                <div class="container">
                    <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right" data-target="#navbarSupportedContent" data-toggle="collapse" type="button">Menu<i class="fa fa-bars ml-2"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('home') ? 'active-nav' : '' }}" href="/home">Kreu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('plans') || Request::is('plans/*')) ? 'active-nav' : '' }}" href="/plans">Projekte të procesuara</a>
                            </li>
                            <li class="nav-item dropdown" style="padding-right: 10px;">
                                <a class="nav-link dropdown-toggle {{ (Request::is('myprofile') || Request::is('myprofile/*') ) ? 'active-nav' : ''}}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Profili im
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/myprofile">Ndrysho të dhënat</a>
                                    <a class="dropdown-item" href="/myprofile/password">Ndrysho fjalëkalimin</a>
                                </div>
                            </li>

                            @if (Auth::user()->role->name == App\Constants::ROLE_ADMIN)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ (Request::is('users') || Request::is('users/*') || Request::is('values') || Request::is('values/*')) ? 'active-nav' : ''}}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Administrim
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/users">Përdoruesit</a>
                                    <a class="dropdown-item" href="/values">Koefiçentët</a>
                                </div>
                            </li>
                            @endif

                        </ul>

                        {{-- @guest
                            <a class="btn btn-primary navbar-btn ml-0 ml-lg-3" href="/login">Kyçu</a>
                        @endguest --}}

                        @auth
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="btn btn-primary navbar-btn ml-0 ml-lg-3">
                                Dil
                            </button>
                        </form>
                        @endauth
                    </div>
                </div>
            </nav> @endauth
        </header>


        <main class="py-4" style="padding-top: 0px !important; ">
            @yield('content')
        </main>
    </div>

    <!-- Back To Top Button -->
    <a href="" class="back-to-top btn-primary"><i class="fa fa-chevron-up"></i></a>

    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/lightbox2/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('js/easing/easing.min.js') }}"></script>
    <script src="{{ asset('js/parsley/parsley.min.js') }}" defer></script>
    <script src="{{ asset('js/scrollreveal/scrollreveal.min.js') }}" defer></script>

    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/order-2.js') }}" defer></script>
    @include('sweetalert::alert')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- DataTable -->
    <script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('js/datatables/dataTables.responsive.min.js') }}" defer></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" defer></script>
    <script src="{{ asset('js/datatables/table-js.js') }}" defer></script>

    <!-- DatePicker -->
    <script src="{{ asset('js/datepicker/datepicker.js') }}"></script>
    <script src="{{ asset('js/datepicker/datepicker.js') }}"></script>
    <script src="{{ asset('js/datepicker/i18n/datepicker.sq.js') }}"></script>

</body>

</html>
