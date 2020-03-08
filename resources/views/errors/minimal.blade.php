<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

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

    </head>
    <body>
        <div id="app" style="padding-top: 0px;">
            <!-- Preloader -->
            <div class="preloader"></div>

            <section class="hero">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div style="padding-top:100px;">
                            <div class="flex-center position-ref full-height">
                                <center>
                                    <div style="display: inline-flex; text-align: center;">
                                        <h2 style="color: #1e69b8;">
                                            <i class="fa fa-exclamation-triangle"></i> @yield('code')&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@yield('message')
                                        </h2>
                                    </div>

                                    <br/>

                                    <div style="display: inline-flex; text-align: center;">
                                        <a href="/" class="btn btn-primary">
                                            {{ trans('messages.back_to_home') }}
                                        </a>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>

