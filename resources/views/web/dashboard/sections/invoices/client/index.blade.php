@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.invoice', 2)).' '.'('.trans_choice('custom/words.client', 1).')'  }}</h2>
    <x-Generic.Table :content="$customerInvoices" columns="{{ ucfirst(__('custom/words.data.input.number.id.label')) }}|id" route="dashboard.invoices.clients:client" crud="show edit destroy create"/>
@endsection
