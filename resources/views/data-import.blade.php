@props(['importTypes'])

@extends('layouts.adminlte')

@section('content_header_title', 'Data Import')

@section('content_body')
    <div class="bg-white shadow-sm rounded-5 p-4 col-md-6">
        <form action="{{ route('import.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="import_type" class="form-label">Import Type</label>
                <select id="import_type" name="import_type" class="form-control @error('import_type') is-invalid @enderror">
                    @foreach($importTypes as $importType)
                        <option value="{{ $importType['permission_id'] }}">{{ $importType['label'] }}</option>
                    @endforeach
                </select>
                @error('import_type') <span class="text-danger" style="font-weight: 700; font-size: 13px">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <x-adminlte-input-file name="files[]" label="DS Sheet" placeholder="Choose files..." legend="Choose" multiple>
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-primary">
                            <i class="fas fa-file-upload"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
            </div>

            <x-adminlte-button type="submit" label="Import" theme="primary"/>
        </form>
    </div>
@stop
