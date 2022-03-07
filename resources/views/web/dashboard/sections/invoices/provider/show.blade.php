@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>Provider Invoice</h2>
    <x-Generic.card :content="$invoice" show="Path|path  ProviderId|provider_id  CreatedAt|created_at  UpdatedAt|updated_at" route="dashboard.invoices.providers:provider"></x-Generic.card>
@endsection
