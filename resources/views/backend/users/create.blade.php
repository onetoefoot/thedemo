@extends('backend.layouts.app')

@section('title', '| ' . __('Add User') )

@section('content')
            <div class="container masonry-item col-md-8 profile">
                <div class="bgc-white p-20 bd">
                    <h4 class="c-grey-900">
                        <i class="ti-user"></i> {{ __('Add User') }} 
                        <a href="{{ route('users.index') }}" class="btn btn-default pull-right">{{__('Cancel')}}</a>
                    </h4>
                    <div class="mT-30">

                        <form method="POST" action=" {{route('users.store')}} " accept-charset="UTF-8">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="inputName">{{ __('Name') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputPassword"><i class="ti-user"></i><span>
                                    </div>
                                    <input type="text" class="form-control" id="inputName" placeholder="John Doe"
                                        name="name" value="{{ old('name') }}" required>
                                </div>
                                    @include('includes.validation', ['fieldname' => 'name'])
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="inputEmail">{{ __('E-Mail Address') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputEmail"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email"
                                        name="email" value="{{ old('email') }}" required>
                                </div>
                                    @include('includes.validation', ['fieldname' => 'email'])
                            </div>

                            <fieldset class="form-group">
                                <div class="row">
                                <legend class="col-form-legend col-sm-2">Role</legend>
                                    <div class="col-sm-10">
                                        @foreach ($roles as $role)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                            {{ Form::checkbox('roles[]', $role->id, false, ['class' => 'form-check-input'] ) }}
                                            {{ ucfirst($role->name) }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </fieldset>

                            <div class="form-group">
                                <label class="text-normal text-dark">{{ __('Password') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputPassword"><i class="ti-key"></i><span>
                                    </div>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" required>
                                </div>
                                    @include('includes.validation', ['fieldname' => 'password'])
                            </div>
                            <div class="form-group">
                                <label class="text-normal text-dark">{{ __('Confirm Password') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputPasswordConfirm"><i class="ti-key"></i><span>
                                    </div>
                                    <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                        name="password_confirmation" required>
                                </div>
                                    @include('includes.validation', ['fieldname' => 'password_confirmation'])
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Add User') }}</button>
                        </form>

                    </div>
                </div>
            </div>

@endsection