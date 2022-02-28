@extends('web.dashboard.layout')

@section('main')
    <a class="backBtn" href="{{ route('dashboard.invoices.index') }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>
    <h2>Client invoices</h2>
    <x-Generic.Table :content="$customerInvoices" columns="Id|id" route="dashboard.invoices.clients:client" crud="show edit destroy create"/>
@endsection
