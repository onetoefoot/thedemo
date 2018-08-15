@extends('layouts.guest')

@section('content')
            <div class="peers ai-s fxw-nw">
                <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r m-auto" style='min-width: 320px;'>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4 class="fw-300 c-grey-900 mB-40">{{ __('Reset Password') }}</h4>
                    <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf

                        <div class="form-group">
                            <label class="text-normal text-dark">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                name="email" placeholder="John.Doe@domain.com" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif

                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-primary">{{ __('Send Password Reset Link') }}</button>
                        </div>
                    </form>
                </div>
            </div>
@endsection