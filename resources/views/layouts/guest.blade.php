<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', '') }}</title>
        @yield('meta')
        <link href="{{ mix('css/app_guest.css') }}" rel="stylesheet">
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

        <div>
            @include('includes.nav-guest')
            <div class="page-container">
                <main class='main-content bgc-grey-100'>
                    <div id='mainContent'>
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>

        @include('cookieConsent::index')
        <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
