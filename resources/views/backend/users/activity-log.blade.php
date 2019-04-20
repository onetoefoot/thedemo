@extends('layouts.app')

@section('title', '| ' . __('Activity Log') )

@section('content')

    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <h4 class="c-grey-900 mB-20">
            <i class="material-icons">list_alt</i> {{ __('Activity Log')}}
            <a href="{{ route('users.index') }}" class="form-a-link pl-4 pull-right c-grey-700">{{__('Users')}}</a>
        </h4>
        <table id="dataTable" class="table table-striped table-bordered table-hover user-table" data-toggle="dataTable" data-form="deleteForm">

            <thead>
                <tr>
                    <th>{{ __('Log Name')}}</th>
                    <th>{{ __('Description')}}</th>
                    <th>{{ __('Subject Type')}}</th>
                    <th>{{ __('Causer Type')}}</th>
                    <th>{{ __('Properties')}}</th>
                    <th>{{ __('Created At')}}</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>{{ __('Log Name')}}</th>
                    <th>{{ __('Description')}}</th>
                    <th>{{ __('Subject Type')}}</th>
                    <th>{{ __('Causer Type')}}</th>
                    <th>{{ __('Properties')}}</th>
                    <th>{{ __('Created At')}}</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($activityLogs as $log)
                <tr>
                    <td>{{ $log->log_name }}</td>
                    <td>{{ $log->description }}</td>
                    <td>{{ $log->subject_type }}</td>
                    <td>{{ $log->causer_type }}</td>
                    <td><!-- {{ $log->properties }} FIX: make this display better --></td>
                    <td>{{ $log->created_at->format('F d, Y h:ia') }}</td>
                </tr>
                @endforeach

            </tbody>

        </table>
    </div>


@endsection