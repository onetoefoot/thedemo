@extends('layouts.app')

@section('title', '| ' . __('Permissions'))

@section('content')

@include('includes.forms.delete-modal')
    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <h4 class="c-grey-900 mB-20">
            <i class="ti-key"></i> {{ __('Permissions')}} 
            <a href="{{ route('users.index') }}" class="form-a-link pl-4 pull-right c-grey-700">{{__('Users')}}</a>
            <a href="{{ route('roles.index') }}" class="form-a-link pl-4 pull-right c-grey-700">{{__('Roles')}}</a>
        </h4>
        <table id="dataTable" class="table table-striped table-bordered table-hover permission-table" data-toggle="dataTable" data-form="deleteForm">

            <thead>
                <tr>
                    <th>{{__('Permission')}}</th>
                    <th>{{__('Operation')}}</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>{{__('Permission')}}</th>
                    <th>{{__('Operation')}}</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td> 
                    <td>
                        @include('includes.forms.edit-record', [
                                'route' => route('permissions.edit', $permission->id)
                            ])
                        @include('includes.forms.delete-record', [
                                'route' => route('permissions.destroy' ,$permission->id)
                            ])
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <a href="{{ route('permissions.create') }}" class="btn btn-primary">Add Permission</a>
    </div>

@endsection