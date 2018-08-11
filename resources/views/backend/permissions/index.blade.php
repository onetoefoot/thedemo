@extends('backend.layouts.app')

@section('title', '| Permissions')

@section('content')

    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <h4 class="c-grey-900 mB-20">
            <i class="ti-key"></i> {{ __('Permissions')}} 
            <a href="{{ route('admin.users.index') }}" class="btn btn-default pull-right">{{__('Users')}}</a>
            <a href="{{ route('admin.roles.index') }}" class="btn btn-default pull-right">{{__('Roles')}}</a>
        </h4>
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">

            <thead>
                <tr>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td> 
                    <td>
                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>
    </div>

@endsection