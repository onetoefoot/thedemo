@extends('layouts.app')

@section('content')

    @include('frontend.account.authorized_clients')

    @include('frontend.account.clients')

@endsection