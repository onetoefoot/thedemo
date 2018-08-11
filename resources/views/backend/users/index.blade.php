@extends('backend.layouts.app')

@section('title', '| Users')

@section('content')
@include('includes.delete-modal')
    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <h4 class="c-grey-900 mB-20">
            <i class="ti-user"></i> {{ __('User Administration')}} 
            <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">{{__('Roles')}}</a>
            <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">{{__('Permissions')}}</a>
        </h4>
        <table class="table table-bordered table-striped table-hover user-table" data-toggle="dataTable" data-form="deleteForm">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date/Time Added</th>
                    <th>User Roles</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date/Time Added</th>
                    <th>User Roles</th>
                    <th>Operations</th>
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
                        <a href="{{ route('users.edit', $user->id) }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700 pull-left" alt="edit">
                            <i class="ti-pencil mR-10"></i>
                        </a>

                        <!-- // <a href="{{ route('users.destroy', $user->id) }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"
                        //     onclick="event.preventDefault(); document.getElementById('user-delete-xxx-form').submit();">
                        //     <i class="ti-trash mR-10"></i>
                        // </a> -->
                        <form action="{{ route('users.destroy' ,$user->id) }}" 
                            method="DELETE" class="form-inline form-delete">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-link form-button-delete c-grey-700"><i class="ti-trash mR-10"></i></button>
                        </form>

                    <!-- {!! Form::model($user, ['method' => 'delete', 'route' => ['users.destroy', $user->id], 'class' =>'form-inline form-delete']) !!} -->
                    <!-- {!! Form::hidden('id', $user->id) !!} -->
                    <!-- <form class="form-inline form-delete">
                        <button class="btn btn-link"><i class="ti-trash mR-10"></i></button>
                    {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger form-button-delete', 'name' => 'delete_modal']) !!}
                    {!! Form::close() !!} -->
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
    </div>

@endsection