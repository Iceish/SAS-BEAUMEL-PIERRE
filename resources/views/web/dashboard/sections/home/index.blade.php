@extends('web.dashboard.layout')

@section('main')
    <h2>{{ \Carbon\Carbon::greet() }} {{ Auth::user()->name }}.</h2>

@endsection
