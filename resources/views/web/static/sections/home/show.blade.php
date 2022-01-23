@extends('web.static.layout')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/static/home/home.css') }}">
@endpush

@section('main')
    <p>Home page.</p>
@endsection
