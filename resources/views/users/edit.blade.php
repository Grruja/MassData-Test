@props(['user'])

@extends('layouts.adminlte')

@section('content_header_title', 'Users')
@section('content_header_subtitle', 'Edit')

@section('content_body')
    <div class="bg-white shadow-sm rounded-5 p-4 col-md-6">
        <form action="{{ route('users.create') }}" method="POST">
            @csrf

            <legend class="text-lg mb-4">Change credentials to: <span class="text-primary">{{ $user->name }}</span></legend>
            <x-adminlte-input name="name" label="Name" value="{{ $user->name }}" required/>
            <x-adminlte-input name="email" label="Email Address" type="email" value="{{ $user->email }}" required/>
            <x-adminlte-input name="password" label="Password" type="password"/>
            <x-adminlte-input name="password_confirmation" label="Confirm Password" type="password"/>

            <x-adminlte-button type="submit" label="Update" theme="primary"/>
        </form>
    </div>
@stop
