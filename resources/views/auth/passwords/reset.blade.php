@extends('layouts.guest')

@section('content')
            <div class="peers ai-s fxw-nw">
                <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r m-auto" style='min-width: 320px;'>
                    <h4 class="fw-300 c-grey-900 mB-40">{{ __('Reset Password') }}</h4>
                    <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

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
                                name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-normal text-dark">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                name="password_confirmation" required>
                            @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">{{ __('Reset Password') }}</button>
                        </div>
                    </form>
                </div>
            </div>
@endsection