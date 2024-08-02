@props(['permission'])

@extends('layouts.adminlte')

@section('content_header_title', 'Permissions')
@section('content_header_subtitle', 'Give')

@section('content_body')
    <div class="mt-3">
        <form action="{{ route('permissions.grant', ['permission' => $permission->id]) }}" method="POST" style="max-width: 350px">
            @csrf
            <legend class="text-lg mb-4">Give <span class="text-primary">{{ $permission->name }}</span> permission</legend>
            <x-adminlte-input name="email" placeholder="user email" required>
                <x-slot name="appendSlot">
                    <x-adminlte-button type="submit" label="Give" theme="primary" />
                </x-slot>
            </x-adminlte-input>
        </form>
    </div>
@stop
