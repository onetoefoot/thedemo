<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', '') }}</title>
        @yield('meta')
        <link href="{{ mix('css/index_guest.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id='loader'>
            <div class="spinner"></div>
        </div>

        <script>
            window.addEventListener('load', () => {
                const loader = document.getElementById('loader');
                setTimeout(() => {
                    loader.classList.add('fadeOut');
                }, 300);
            });
        </script>

        @include('includes.nav-guest')

        <!-- <div class="flex-center position-ref full-height"> -->
        <main role="main" class="container">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        @include('cookieConsent::index')
        <script type="text/javascript" src="{{ mix('js/index_guest.js') }}"></script>
    </body>
</html>
