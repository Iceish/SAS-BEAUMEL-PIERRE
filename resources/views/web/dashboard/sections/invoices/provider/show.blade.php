@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.invoice', true)).' '.'('.trans_choice('custom/words.provider', true).')'  }}</h2>

    <x-Generic.card :content="$invoice" show="Path|path  ProviderId|provider_id  CreatedAt|created_at  UpdatedAt|updated_at" route="dashboard.invoices.providers:provider"></x-Generic.card>
@endsection
