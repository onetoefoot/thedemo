@extends('frontend.layouts.app')

@section('content')

            <div class="container masonry-item col-md-8 profile">
                <div class="bgc-white p-20 bd">
                    <h4 class="c-grey-900">{{__('Account')}} </h4>
                    <div class="mT-30">
                        <form class="form" method="POST" action="{{ route('account.profile.update') }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Profile</a>
                                    <a class="nav-item nav-link" id="nav-information-tab" data-toggle="tab" href="#nav-information" role="tab" aria-controls="nav-information" aria-selected="false">Information</a>
                                    <a class="nav-item nav-link" id="nav-changepassword-tab" data-toggle="tab" href="#nav-changepassword" role="tab" aria-controls="nav-changepassword" aria-selected="false">Change Password</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="inputName">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" id="inputName" placeholder="John Doe"
                                            name="name" value="{{ old('name', Auth::user()->name) }}" required>
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="inputEmail">{{ __('E-Mail Address') }}</label>
                                        <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email"
                                            name="email" value="{{ old('email', Auth::user()->email) }}" required>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-information" role="tabpanel" aria-labelledby="nav-information-tab">
                                    <div class="form-group{{ $errors->has('timezone') ? ' has-error' : '' }}">
                                        <label for="inputTimezone">{{ __('Timezone') }}</label>
                                        <input type="text" class="form-control" id="inputTimezone" placeholder="Timezone"
                                            name="timezone" value="{{ old('timezone', Auth::user()->timezone) }}" required>
                                            @if ($errors->has('timezone'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('timezone') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-changepassword" role="tabpanel" aria-labelledby="nav-changepassword-tab">
                                    <div class="form-group">
                                        <label class="text-normal text-dark">{{ __('Current Password') }}</label>
                                        <input id="password-current" type="password" class="form-control{{ $errors->has('password-current') ? ' is-invalid' : '' }}"
                                            name="password-current" placeholder="Current Password" required>
                                            @if ($errors->has('password-current'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password-current') }}</strong>
                                                </span>
                                            @endif
                                    </div>


                                    <div class="form-group">
                                        <label class="text-normal text-dark">{{ __('New Password') }}</label>
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password" placeholder="New Password" required>
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
                                </div>
                            </div>

                            <div class="mt-5 form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

@endsection