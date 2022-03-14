@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.invoice', 2)).' '.'('.trans_choice('custom/words.provider', 1).')'  }}</h2>
    <x-Generic.Table :content="$providerInvoices" columns="{{ ucfirst(__('custom/words.data.input.text.fullname.label')) }}|provider:name" route="dashboard.invoices.providers:provider" crud="show edit destroy create"/>
@endsection
