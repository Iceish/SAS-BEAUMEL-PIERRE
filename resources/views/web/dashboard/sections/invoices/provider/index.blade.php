@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.invoice', false)).' '.'('.trans_choice('custom/words.provider', true).')'  }}</h2>
    <x-Generic.Table :content="$providerInvoices" columns="{{ ucfirst(__('custom/words.data.input.number.id.label')) }}|id" route="dashboard.invoices.providers:provider" crud="show edit destroy create"/>
@endsection
