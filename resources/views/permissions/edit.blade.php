@props(['permission'])

@extends('layouts.adminlte')

@section('content_header_title', 'Permissions')
@section('content_header_subtitle', 'Edit')

@section('content_body')
    <div class="mt-3">
        <form action="{{ route('permissions.update', ['permission' => $permission->id]) }}" method="POST" style="max-width: 350px">
            @csrf
            <legend class="text-lg mb-4">Edit Permission</legend>
            <x-adminlte-input name="name" placeholder="permission name" value="{{ $permission->name }}" required>
                <x-slot name="appendSlot">
                    <x-adminlte-button type="submit" label="Update" theme="primary" />
                </x-slot>
            </x-adminlte-input>
        </form>
    </div>
@stop
