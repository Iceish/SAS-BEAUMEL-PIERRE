@extends('web.dashboard.layout')

@section('main')
    <a class="backBtn" href="{{ route('dashboard.invoices.index') }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>
    <h2>Provider invoices</h2>
    <x-Generic.Table :content="$providerInvoices" columns="Id|id" route="dashboard.invoices.providers:provider" crud="show edit destroy create"/>
@endsection
