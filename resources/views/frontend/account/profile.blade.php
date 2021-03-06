@extends('layouts.app')

@section('content')

            <div class="container masonry-item col-md-8 profile">
                <div class="bgc-white p-20 bd">
                    <h4 class="c-grey-900">{{__('Account')}} </h4>
                    <div class="mT-30">
                        <form class="form" method="POST" action="{{ route('account.profile.update') }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <nav class="nav nav-pills nav-tabs flex-columns flex-sm-row" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Profile</a>
                                <a class="nav-item nav-link" id="nav-information-tab" data-toggle="tab" href="#nav-information" role="tab" aria-controls="nav-information" aria-selected="false">Information</a>
                                <a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="false">Password</a>
                            </nav>
                            
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade active show" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                                    <div class="form-group{{ $errors->has('name') ? ' alert alert-danger' : '' }}">
                                        @include('includes.forms.field-text', [
                                            'fieldName' => 'name', 'displayName' => __('Name'),
                                            'iconClass' => 'ti-user', 'placeholder' => __('Jon Name'),
                                            'old' => old('name', Auth::user()->name), 'required' => 'required'
                                        ])
                                        @include('includes.forms.validation', ['fieldname' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' alert alert-danger' : '' }}">
                                        @include('includes.forms.field-text', [
                                            'fieldName' => 'email', 'displayName' => __('E-Mail Address'),
                                            'iconClass' => 'ti-email', 'placeholder' => __('John.Doe@domain.com'),
                                            'old' => old('email', Auth::user()->email), 'required' => 'required'
                                        ])
                                        @include('includes.forms.validation', ['fieldname' => 'name'])
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="nav-information" role="tabpanel" aria-labelledby="nav-information-tab">
                                    <div class="form-group">
                                        @include('includes.forms.field-upload', [
                                            'fieldName' => 'avatar', 'displayName' => __('Avatar (optional)'),
                                            'iconClass' => 'ti-user', 'placeholder' => '',
                                            'old' => '', 'required' => ''
                                        ])
                                        @include('includes.forms.validation', ['fieldname' => 'name'])
                                    </div>

                                    <div class="form-group{{ $errors->has('timezone') ? ' alert alert-danger' : '' }}">
                                        @include('includes.forms.field-select', [
                                            'fieldName' => 'timezone', 'displayName' => __('Timezone'),
                                            'iconClass' => 'ti-time', 'placeholder' => __('Timezone'),
                                            'old' => old('timezone', Auth::user()->timezone), 'options' => $timezonelist
                                        ])
                                        @include('includes.forms.validation', ['fieldname' => 'name'])
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
                                    <div class="form-group{{ $errors->has('password-current') ? ' is-invalid' : '' }}">
                                        @include('includes.forms.field-text', [
                                            'fieldName' => 'password-current', 'displayName' => __('Current Password'), 'type' => 'password',
                                            'iconClass' => 'ti-key', 'placeholder' => 'Current Password'
                                        ])
                                        @include('includes.forms.validation', ['fieldname' => 'password-current'])
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' is-invalid' : '' }}">
                                        @include('includes.forms.field-text', [
                                            'fieldName' => 'password', 'displayName' => __('Password'), 'type' => 'password',
                                            'iconClass' => 'ti-key'
                                        ])
                                        @include('includes.forms.validation', ['fieldname' => 'password'])
                                    </div>
                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}">
                                        @include('includes.forms.field-text', [
                                            'fieldName' => 'password_confirmation', 'displayName' => __('Confirm Password'), 'type' => 'password',
                                            'iconClass' => 'ti-key'
                                        ])
                                        @include('includes.forms.validation', ['fieldname' => 'password_confirmation'])
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