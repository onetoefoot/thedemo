@extends('layouts.app')

@section('title', '| ' . __('USERS'))

@section('content')

@include('includes.forms.delete-modal')
    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <h4 class="c-grey-900 mB-20">
            <i class="material-icons">group</i> {{ __('USERS')}} 
            <a href="{{ route('roles.index') }}" class="form-a-link pl-4 pull-right c-grey-700">{{__('ROLES')}}</a>
            <a href="{{ route('permissions.index') }}" class="form-a-link pl-4 pull-right c-grey-700">{{__('PERMISSIONS')}}</a>
        </h4>
        <table id="users-table" class="table table-striped table-bordered table-hover user-table" data-toggle="dataTable" data-form="deleteForm">

            <thead>
                <tr>
                    <th>{{ __('Name')}}</th>
                    <th>{{ __('Email')}}</th>
                    <th>{{ __('Date/Time Added')}}</th>
                    <th>{{ __('User Roles')}}</th>
                    <th>{{ __('Operations')}}</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>{{ __('Name')}}</th>
                    <th>{{ __('Email')}}</th>
                    <th>{{ __('Date/Time Added')}}</th>
                    <th>{{ __('User Roles')}}</th>
                    <th>{{ __('Operations')}}</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>
                    <td>
                        @include('includes.forms.edit-record', [
                                'route' => route('users.edit', $user->id)
                            ])
                        @include('includes.forms.activity-log', [
                                'route' => route('activity-log.show' ,$user->id)
                            ])
                        @include('includes.forms.delete-record', [
                                'route' => route('users.destroy' ,$user->id)
                            ])
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
    </div>

@endsection
