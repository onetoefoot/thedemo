@extends('auth.app')

@section('content')
            <div class="peers ai-s fxw-nw">
                <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style='min-width: 320px;'>
                    <h4 class="fw-300 c-grey-900 mB-40">{{ __('Login') }}</h4>
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group">
                            <label class="text-normal text-dark">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                name="email" placeholder="John.Doe@domain.com" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif

                        </div>
                        <div class="form-group">
                            <label class="text-normal text-dark">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                name="password" placeholder="Password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="peers ai-c jc-sb fxw-nw">
                                <div class="peer">
                                    <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                                        <!-- <input type="checkbox" id="inputCall1" name="inputCheckboxesCall" class="peer"> -->
                                        <input type="checkbox" id="remember" name="remember" class="peer" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="inputCall1" class=" peers peer-greed js-sb ai-c">
                                            <span class="peer peer-greed">{{ __('Remember Me') }}</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="peer">
                                    <button class="btn btn-primary">{{ __('Login') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right links">
                            <a class="" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
@endsection