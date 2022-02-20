@extends('web.dashboard.layout')

@section('tag','invoices')

@section('main')
    <a class="btn" href="{{ route('dashboard.invoices.client.index') }}">Client</a>
    <a class="btn" href="{{ route('dashboard.invoices.supplier.index') }}">Supplier</a>
@endsection
