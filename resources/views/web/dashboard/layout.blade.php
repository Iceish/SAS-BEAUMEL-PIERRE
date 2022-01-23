@extends('web.index')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/dashboard/dashboard.css') }}">
@endpush

@section('title', 'dashboard.css')

@section('head')
    @include('web.dashboard.layout.head.links')
    @include('web.dashboard.layout.head.css')
    @include('web.dashboard.layout.head.js')
@endsection

@section('body')
    @include('web.dashboard.layout.header')
    @include('web.dashboard.layout.main')
    @include('web.dashboard.layout.footer')
@endsection
