@extends('layouts.adminlte')

@section('content_header_title', 'Permissions')

@section('content_body')
    @include('permissions.create')
    @include('permissions.table')
@stop
