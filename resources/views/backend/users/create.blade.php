@extends('backend.layouts.app')

@section('title', '| ' . __('Add User') )

@section('content')
            <div class="container masonry-item col-md-8 profile">
                <div class="bgc-white p-20 bd">
                    <h4 class="c-grey-900">
                        <i class="ti-user"></i> {{ __('Add User') }} 
                        <a href="{{ route('users.index') }}" class="form-a-link pl-4 pull-right c-grey-700">{{__('Cancel')}}</a>
                    </h4>
                    <div class="mT-30">

                        <form method="POST" action=" {{route('users.store')}} " accept-charset="UTF-8">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="inputName">{{ __('Name') }}</label>
                                @include('includes.forms.field-text', [
                                    'fieldName' => 'name', 'displayName' => __('Name'),
                                    'iconClass' => 'ti-key', 'placeholder' => __('John Doe'),
                                    'old' => old('name'), 'required' => 'required'
                                ])
                                @include('includes.forms.validation', ['fieldname' => 'name'])
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                @include('includes.forms.field-text', [
                                    'fieldName' => 'email', 'displayName' => __('E-Mail Address'),
                                    'iconClass' => 'ti-email', 'placeholder' => __('John.Doe@domain.com'),
                                    'old' => old('email'), 'required' => 'required'
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
                                                <input class="form-check-input" name="roles[]" type="checkbox" 
                                                        value="{{$role->id}}"> {{ ucfirst($role->name) }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </fieldset>

                            <div class="form-group">
                                @include('includes.forms.field-text', [
                                    'fieldName' => 'password', 'displayName' => __('Password'),
                                    'iconClass' => 'ti-key', 'placeholder' => '',
                                    'old' => '', 'required' => 'required'
                                ])
                                @include('includes.forms.validation', ['fieldname' => 'password'])
                            </div>
                            <div class="form-group">
                                @include('includes.forms.field-text', [
                                    'fieldName' => 'password_confirmation', 'displayName' => __('Confirm Password'),
                                    'iconClass' => 'ti-key', 'placeholder' => '',
                                    'old' => '', 'required' => 'required'
                                ])
                                @include('includes.forms.validation', ['fieldname' => 'password_confirmation'])
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Add User') }}</button>
                        </form>

                    </div>
                </div>
            </div>

@endsection