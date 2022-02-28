@extends('web.dashboard.layout')

@section('tag','invoices')

@section('main')
    <a class="btn" href="{{ route('dashboard.invoices.clients.index') }}">Client</a>
    <a class="btn" href="{{ route('dashboard.invoices.providers.index') }}">Provider</a>
@endsection
