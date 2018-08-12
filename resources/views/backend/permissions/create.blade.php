@extends('backend.layouts.app')

@section('title', '| ' . __('Add Permission') )

@section('content')

            <div class="container masonry-item col-md-8 profile">
                <div class="bgc-white p-20 bd">
                    <h4 class="c-grey-900">
                        <i class="ti-key"></i> {{ __('Add Permission') }} 
                        <a href="{{ route('permissions.index') }}" class="form-a-link pl-4 pull-right c-grey-700">{{__('Cancel')}}</a>
                    </h4>
                    <div class="mT-30">

                        <form method="POST" action=" {{route('permissions.store')}} " accept-charset="UTF-8">
                                {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                @include('includes.forms.field-text', [
                                    'fieldName' => 'name', 'displayName' => __('Name'),
                                    'iconClass' => 'ti-key', 'placeholder' => __('Permission Name'),
                                    'old' => old('name'), 'required' => 'required'
                                ])
                                @include('includes.forms.validation', ['fieldname' => 'name'])
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                <legend class="col-form-legend col-sm-2">Assign Roles</legend>
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

                            <button type="submit" class="btn btn-primary">{{ __('Add Permission') }}</button>
                        </form>

                    </div>
                </div>
            </div>

@endsection