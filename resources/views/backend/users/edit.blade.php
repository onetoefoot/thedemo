@extends('backend.layouts.app')

@section('title', '| ' . __('Edit User') )

@section('content')
            <div class="container masonry-item col-md-8 profile">
                <div class="bgc-white p-20 bd">
                    <h4 class="c-grey-900">
                        <i class="ti-user"></i> {{ __('Edit ') }} ( {{$user->name}} )
                        <a href="{{ route('users.index') }}" class="btn btn-default pull-right">{{__('Cancel')}}</a>
                    </h4>
                    <div class="mT-30">
                        <form method="POST" action="{{ route('users.update', ['id' => $user->id])}}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="inputName">{{ __('Name') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputPassword"><i class="ti-user"></i><span>
                                    </div>
                                    <input type="text" class="form-control" id="inputName" placeholder="John Doe"
                                        name="name" value="{{ old('name', $user->name) }}" required>
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
                                        name="email" value="{{ old('email', $user->email) }}" required>
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
                                                <input class="form-check-input" 
                                                        @if(in_array($role->id, $user_roles))
                                                            checked="checked"
                                                        @endif
                                                    name="roles[]" type="checkbox" value="{{$role->id}}"> {{ ucfirst($role->name) }}

                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </fieldset>

                            <div class="form-group">
                                <label for="inputPassword">{{ __('Password') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputPassword"><i class="ti-key"></i><span>
                                    </div>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password">
                                </div>
                                    @include('includes.validation', ['fieldname' => 'password'])
                            </div>
                            <div class="form-group">
                                <label for="inputPasswordConfirm">{{ __('Confirm Password') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputPasswordConfirm"><i class="ti-key"></i><span>
                                    </div>
                                    <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                        name="password_confirmation">
                                </div>
                                    @include('includes.validation', ['fieldname' => 'password_confirmation'])
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                        </form>
                    </div>
                </div>
            </div>

@endsection