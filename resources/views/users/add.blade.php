@extends('layouts.adminlte')

@section('content_header_title', 'Users')
@section('content_header_subtitle', 'Add')

@section('content_body')
    <div class="bg-white shadow-sm rounded-5 p-4 col-md-6">
        <form action="{{ route('users.create') }}" method="POST">
            @csrf

            <x-adminlte-input name="name" label="Name" value="{{ old('name') }}" required/>
            <x-adminlte-input name="email" label="Email Address" type="email" value="{{ old('email') }}" required/>
            <x-adminlte-input name="password" label="Password" type="password" required/>
            <x-adminlte-input name="password_confirmation" label="Confirm Password" type="password" required/>

            <x-adminlte-button type="submit" label="Create" theme="primary"/>
        </form>
    </div>
@stop
