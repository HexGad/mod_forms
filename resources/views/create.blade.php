@extends('dashboard.layouts.base')
@push('styles')
    {{ module_vite('forms', 'resources/assets/sass/app.scss') }}
@endpush


@section('content')
    <div id="app">
        <create></create>
    </div>
@endsection

@push('scripts')
    {{ module_vite('forms', 'resources/assets/js/app.js') }}
@endpush
