@include('js-localization::head')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AFA') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
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
        @auth
            <nav id="navbar" class="navbar navbar-expand-lg fixed-top mainbar" role="navigation">
                <div class="container">

                    <button id="navbar-button" class="navbar-toggler" type="button" style="padding-left: 0px;">
                        {{ trans('messages.menu') }}<i class="fa fa-bars ml-2"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('home') ? 'active-nav' : '' }}" href="/home">{{ trans('messages.dashboard') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('plans') || Request::is('plans/*')) ? 'active-nav' : '' }}" href="/plans">{{ trans('messages.processed_projects') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ (Request::is('myprofile') || Request::is('myprofile/*') ) ? 'active-nav' : ''}}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ trans('messages.my_profile') }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item {{ Request::is('myprofile') ? 'active-nav' : '' }}" href="/myprofile">{{ trans('messages.change_data') }}</a>
                                    <a class="dropdown-item {{ Request::is('myprofile/password') ? 'active-nav' : '' }}" href="/myprofile/password">{{ trans('messages.change_password') }}</a>
                                </div>
                            </li>

                            @if (Auth::user()->role->id == App\Constants::ROLE_ADMIN)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ (Request::is('users') || Request::is('users/*') || Request::is('values') || Request::is('values/*') || Request::is('taxes') || Request::is('taxes/*')) ? 'active-nav' : ''}}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ trans('messages.administration') }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item {{ (Request::is('users') || Request::is('users/*')) ? 'active-nav' : '' }}" href="/users">{{ trans('messages.users') }}</a>
                                    <a class="dropdown-item {{ (Request::is('values') || Request::is('values/*')) ? 'active-nav' : '' }}" href="/values">{{ trans('messages.coefficients') }}</a>
                                    <a class="dropdown-item {{ (Request::is('taxes') || Request::is('taxes/*')) ? 'active-nav' : '' }}" href="/taxes">{{ trans('messages.taxes') }}</a>
                                </div>
                            </li>
                            @endif

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ trans('messages.language') }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('locale/' . App\Constants::ALBANIAN_LANGUAGE) }}" style="padding-left: 0px;">
                                        <img src="{{ asset('img/flags/al.svg') }}" style="width: 30px; height: 20px;"/> {{ trans('messages.albanian') }} {!! App::getLocale() == App\Constants::ALBANIAN_LANGUAGE ? '<i class="fas fa-check" style="color: #8ea604;"></i>' : '' !!}
                                    </a>
                                    <a class="dropdown-item" href="{{ url('locale/' . App\Constants::ENGLISH_LANGUAGE) }}" style="padding-left: 0px;">
                                        <img src="{{ asset('img/flags/gb.svg') }}" style="width: 30px; height: 20px;"/> {{ trans('messages.english') }} {!! App::getLocale() == App\Constants::ENGLISH_LANGUAGE ? '<i class="fas fa-check" style="color: #8ea604;"></i>' : '' !!}
                                    </a>
                                </div>
                            </li>
                        </ul>

                        {{-- @guest
                            <a class="btn btn-primary navbar-btn ml-0 ml-lg-3" href="/login">Kyçu</a>
                        @endguest --}}

                        @auth
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="btn btn-primary navbar-btn ml-0 ml-lg-3">
                                {{ trans('messages.logout') }}
                            </button>
                        </form>
                        @endauth
                    </div>
                </div>
            </nav>
        @endauth


        <main class="py-4" style="padding-top: 0px !important; ">
            @yield('content')
        </main>
    </div>

    <!-- Back To Top Button -->
    {{-- <a href="" id="back-to-top" class="back-to-top btn-primary" onclick="this.blur();"><i class="fa fa-chevron-up"></i></a> --}}

    @yield('js-localization.head')
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
    <script src="{{ asset('js/datepicker/i18n/datepicker.en.js') }}"></script>
</body>

</html>
