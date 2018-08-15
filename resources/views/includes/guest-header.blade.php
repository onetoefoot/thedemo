    <nav class="navbar navbar-expand-md fixed-top links">
        <a class="navbar-brand" href="/">{{config('app.name', '')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown show links">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">{{__('Help')}}</a>
                    <div class="dropdown-menu " aria-labelledby="dropdown01">
                        <a class='dropdown-item' href="/docs">{{__('Documentation')}}</a>
                        <a class='dropdown-item' href="/docs/terms_of_service">{{__('Terms of service')}}</a>
                        <a class='dropdown-item' href="/docs/privacy_policy">{{__('Privacy policy')}}</a>
                    </div>
                </li>        
            </ul>
            <ul class="navbar-nav">
                @if (Route::has('login'))
                    @auth
                    <li class="nav-item links">
                        <a class="nav-link"  href="{{ url('/dashboard') }}">{{ __('Dashboard') }}</a>
                    </li>
                    @else
                    <li class="nav-item links">
                        <a class="nav-link"  href="{{ url('/login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item links">
                        <a class="nav-link"  href="{{ url('/register') }}">{{ __('Register') }}</a>
                    </li>
                    @endauth
                @endif
            </ul>
        </div>
    </nav>
