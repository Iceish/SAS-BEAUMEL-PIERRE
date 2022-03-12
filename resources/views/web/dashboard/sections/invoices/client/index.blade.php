@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.invoice', false)).' '.'('.trans_choice('custom/words.client', true).')'  }}</h2>
    <x-Generic.Table :content="$customerInvoices" columns="{{ ucfirst(__('custom/words.data.input.number.id.label')) }}|id" route="dashboard.invoices.clients:client" crud="show edit destroy create"/>
@endsection
