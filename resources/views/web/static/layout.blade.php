@extends('web.index')

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
