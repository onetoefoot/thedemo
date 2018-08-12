@extends('backend.layouts.app')

@section('title', '| ' . __('Edit Role') )

@section('content')
            <div class="container masonry-item col-md-8 profile">
                <div class="bgc-white p-20 bd">
                    <h4 class="c-grey-900">
                        <i class="ti-key"></i> {{ __('Edit ') }} ( {{$role->name}} )
                        <a href="{{ route('roles.index') }}" class="form-a-link pl-4 pull-right c-grey-700">{{__('Cancel')}}</a>
                    </h4>
                    <div class="mT-30">
                        <form method="POST" action="{{ route('roles.update', ['id' => $role->id])}}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                @include('includes.forms.field-text', [
                                    'fieldName' => 'name', 'displayName' => __('Name'),
                                    'iconClass' => 'ti-key', 'placeholder' => __('Role Name'),
                                    'old' => old('name', $role->name), 'required' => 'required'
                                ])
                                @include('includes.forms.validation', ['fieldname' => 'name'])
                            </div>

                            <fieldset class="form-group">
                                <div class="row">
                                <legend class="col-form-legend col-sm-2">Assign Permissions</legend>
                                    <div class="col-sm-10">
                                        @foreach ($permissions as $permission)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" 
                                                        @if(is_array($role->permissions) && in_array($permission->id, $role->permissions))
                                                            checked="checked"
                                                        @endif
                                                    name="permissions[]" type="checkbox" value="{{$permission->id}}"> {{ ucfirst($permission->name) }}

                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </fieldset>

                            <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                        </form>
                    </div>
                </div>
            </div>


@endsection