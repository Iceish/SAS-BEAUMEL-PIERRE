@extends('web.index')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/static/static.css') }}">
@endpush

@section('title', 'static')

@section('head')
    @include('web.static.layout.head.links')
    @include('web.static.layout.head.css')
    @include('web.static.layout.head.js')
@endsection


@section('body')
    @include('web.static.layout.header')
    @include('web.static.layout.main')
    @include('web.static.layout.footer')
@endsection
