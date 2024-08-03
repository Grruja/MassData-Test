@extends('layouts.adminlte')

@section('content_header_title', 'Data Import')

@section('content_body')
    <div class="bg-white shadow-sm rounded-5 p-4 col-md-6">
        <form action="" method="POST">
            @csrf

            <x-adminlte-select name="import_type" label="Import Type">
                <x-adminlte-options :options="array_map(fn($item) => $item['label'], config('import'))"
                                    placeholder="Select an option..."/>
            </x-adminlte-select>

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
