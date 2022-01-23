@extends('web.index')

@section('title', 'dashboard')

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
