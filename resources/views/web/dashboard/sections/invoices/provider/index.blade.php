@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>Provider invoices</h2>
    <x-Generic.Table :content="$providerInvoices" columns="Id|id" route="dashboard.invoices.providers:provider" crud="show edit destroy create"/>
@endsection
