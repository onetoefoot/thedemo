@extends('backend.layouts.app')

@section('title', '| Users')

@section('content')

@include('includes.delete-modal')
    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <h4 class="c-grey-900 mB-20">
            <i class="ti-user"></i> {{ __('User Administration')}} 
            <a href="{{ route('roles.index') }}" class="form-a-link pl-4 pull-right c-grey-700">{{__('Roles')}}</a>
            <a href="{{ route('permissions.index') }}" class="form-a-link pl-4 pull-right c-grey-700">{{__('Permissions')}}</a>
        </h4>
        <table class="table table-bordered table-striped table-hover user-table" data-toggle="dataTable" data-form="deleteForm">

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
                        <a href="{{ route('users.edit', $user->id) }}" class="d-b td-n mt-2 c-grey-700 pull-left" alt="edit">
                            <i class="ti-pencil mR-10"></i>
                        </a>
                        <form action="{{ route('users.destroy' ,$user->id) }}" 
                            method="DELETE" class="form-inline form-delete">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-link form-button-delete c-grey-700"><i class="ti-trash mR-10"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
    </div>

@endsection