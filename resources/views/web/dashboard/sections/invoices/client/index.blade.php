@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>Client invoices</h2>
    <x-Generic.Table :content="$customerInvoices" columns="Id|id" route="dashboard.invoices.clients:client" crud="show edit destroy create"/>
@endsection
