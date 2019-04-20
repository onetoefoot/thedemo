@extends('layouts.app')

@section('title', '| ' . __('Edit Permission') )

@section('content')
            <div class="container masonry-item col-md-8 profile">
                <div class="bgc-white p-20 bd">
                    <h4 class="c-grey-900">
                    <i class="material-icons">lock</i> {{ __('Edit ') }} ( {{$permission->name}} )
                        <a href="{{ route('permissions.index') }}" class="form-a-link pl-4 pull-right c-grey-700">{{__('Cancel')}}</a>
                    </h4>
                    <div class="mT-30">
                        <form method="POST" action="{{ route('permissions.update', ['id' => $permission->id])}}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group{{ $errors->has('name') ? ' alert alert-danger' : '' }}">
                                @include('includes.forms.field-text', [
                                    'fieldName' => 'name', 'displayName' => __('Name'),
                                    'iconClass' => 'ti-key', 'placeholder' => __('Permission Name'),
                                    'old' => old('name', $permission->name), 'required' => 'required'
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
                                                <input class="form-check-input" 
                                                        @if(is_array($role->permissions) && in_array($permission->id, $role->permissions))
                                                            checked="checked"
                                                        @endif
                                                    name="roles[]" type="checkbox" value="{{$role->id}}"> {{ ucfirst($role->name) }}

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
