
<div class="guest-header">
                <div class="top-left links">
                    <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{__('Help')}}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class='dropdown-item' href="#">{{__('Documentation')}}</a>
                            <a class='dropdown-item' href="#">{{__('Terms of service')}}</a>
                            <a class='dropdown-item' href="#">{{__('Privacy policy')}}</a>
                        </div>
                    </div>
                </div>
                @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/dashboard') }}">{{ __('Dashboard') }}</a>
                    @else
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endauth
                </div>
                @endif
</div>