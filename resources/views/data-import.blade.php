@props(['importTypes'])

@extends('layouts.adminlte')

@section('content_header_title', 'Data Import')

@section('content_body')
    <div class="bg-white shadow-sm rounded-5 p-4 col-md-6">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="import_type" class="form-label">Import Type</label>
            <select id="import_type" name="import_type" class="form-control mb-3">
                @foreach($importTypes as $importType)
                    <option value="{{ $importType['permission_required'] }}">{{ $importType['label'] }}</option>
                @endforeach
            </select>

            <x-adminlte-input-file name="files[]" label="DS Sheet" placeholder="Choose files..." legend="Choose" multiple>
                <x-slot name="prependSlot">
                    <div class="input-group-text text-primary">
                        <i class="fas fa-file-upload"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-file>

            <x-adminlte-button type="submit" label="Import" theme="primary"/>
        </form>
    </div>
@stop
