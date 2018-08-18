<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', '') }}</title>
        @yield('meta')
        <link href="{{ mix('css/index.css') }}" rel="stylesheet">
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

        <div id="app">
          @include('includes.sidebar')
          <div class="page-container">
              @include('includes.nav')
              <main class='main-content bgc-grey-100'>
                  <div id='mainContent'>
                      @yield('content')
                  </div>
              </main>
            @include('includes.footer')
          </div>
        </div>


        @include('cookieConsent::index')
        <script type="text/javascript" src="{{ mix('js/index.js') }}"></script>
    </body>
</html>
