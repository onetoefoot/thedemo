@extends('layouts.app')

@section('title', '| ' . __('Roles'))

@section('content')

@include('includes.forms.delete-modal')
    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <h4 class="c-grey-900 mB-20">
        <i class="material-icons">lock</i> {{ __('Roles')}} 
            <a href="{{ route('users.index') }}" class="form-a-link pl-4 pull-right c-grey-700">{{__('Users')}}</a>
            <a href="{{ route('permissions.index') }}" class="form-a-link pl-4 pull-right c-grey-700">{{__('Permissions')}}</a>
        </h4>
        <table id="roles-table" class="table table-striped table-bordered table-hover role-table" data-toggle="dataTable" data-form="deleteForm">

            <thead>
                <tr>
                    <th>{{__('Role')}}</th>
                    <th>{{__('Permissions')}}</th>
                    <th>{{__('Operation')}}</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                <th>{{__('Role')}}</th>
                    <th>{{__('Permissions')}}</th>
                    <th>{{__('Operation')}}</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>{{  $role->permissions()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                    <td>
                        @include('includes.forms.edit-record', [
                                'route' => route('roles.edit', $role->id)
                            ])
                        @include('includes.forms.delete-record', [
                                'route' => route('roles.destroy' ,$role->id)
                            ])
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <a href="{{ route('roles.create') }}" class="btn btn-primary">Add Role</a>
    </div>

@endsection