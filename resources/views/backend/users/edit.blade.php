@extends('layouts.app')

@section('title', '| ' . __('EDIT USER') )

@section('content')
            <div class="container masonry-item col-md-8 profile">
                <div class="bgc-white p-20 bd">
                    <h4 class="c-grey-900">
                        <i class="ti-user"></i> {{ __('EDIT ') }} ( {{$user->name}} )
                        <a href="{{ route('users.index') }}" class="form-a-link pl-4 pull-right c-grey-700">{{__('CANCEL')}}</a>
                    </h4>
                    <div class="mT-30">
                        <form method="POST" action="{{ route('users.update', ['id' => $user->id])}}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group{{ $errors->has('name') ? ' alert alert-dangerr' : '' }}">
                                @include('includes.forms.field-text', [
                                    'fieldName' => 'name', 'displayName' => __('Name'),
                                    'iconClass' => 'ti-key', 'placeholder' => __('John Doe'),
                                    'old' => old('name', $user->name), 'required' => 'required'
                                ])
                                @include('includes.forms.validation', ['fieldname' => 'name'])
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' alert alert-dangerr' : '' }}">
                                @include('includes.forms.field-text', [
                                    'fieldName' => 'email', 'displayName' => __('E-Mail Address'),
                                    'iconClass' => 'ti-email', 'placeholder' => __('John.Doe@domain.com'),
                                    'old' => old('email', $user->email), 'required' => 'required'
                                ])
                                @include('includes.forms.validation', ['fieldname' => 'email'])
                            </div>

                            <fieldset class="form-group">
                                <div class="row">
                                <legend class="col-form-legend col-sm-2">Role</legend>
                                    <div class="col-sm-10">
                                        @foreach ($roles as $role)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" 
                                                        @if(is_array($user_roles) && in_array($role->id, $user_roles))
                                                            checked="checked"
                                                        @endif
                                                    name="roles[]" type="checkbox" value="{{$role->id}}"> {{ ucfirst($role->name) }}

                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </fieldset>

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

                            <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                        </form>
                    </div>
                </div>
            </div>

@endsection