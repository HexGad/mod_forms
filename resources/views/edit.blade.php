@extends('dashboard.layouts.base')
@section('toolbar')
    @include('dashboard.layouts.components.toolbar',[
        'title' => 'Forms',
        'breadcrumbs' => [
            ['title'=> 'Home', 'url' => url('/dashboard/')],
            ['title'=> 'Forms', 'url' => route('dashboard.forms.index')],
            ['title'=> 'Edit Forms'],
        ]
    ])
@endsection

@push('styles')
    {{ module_vite('forms', 'resources/assets/sass/app.scss') }}
@endpush


@section('content')
    <div id="app">
        <edit :form-data="{{json_encode($form)}}"></edit>
    </div>
@endsection

@push('scripts')
    {{ module_vite('forms', 'resources/assets/js/app.js') }}
@endpush
