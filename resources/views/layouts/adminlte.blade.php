@extends('adminlte::page')

@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle') | @yield('subtitle') @endif
@stop

@section('content_header')
    @if(session()->has('success'))
        <div id="toast" class="alert alert-success position-absolute text-center" style="z-index: 2; right: 18px; bottom: 0" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif

    @hasSection('content_header_title')
        <h1 class="text-muted border-bottom pb-3">
            @yield('content_header_title')

            @hasSection('content_header_subtitle')
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>
                    @yield('content_header_subtitle')
                </small>
            @endif
        </h1>
    @endif
@stop

@section('content')
    @yield('content_body')
@stop

@section('js')
    <script src="{{ asset('/script.js') }}"></script>
@stop

