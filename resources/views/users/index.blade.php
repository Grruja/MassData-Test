@extends('layouts.adminlte')

@section('content_header_title', 'Users')

@section('content_body')
    @include('users.table')
@stop
