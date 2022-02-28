@extends('web.dashboard.layout')

@section('main')
    <a class="backBtn" href="{{ route('dashboard.invoices.providers.index') }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>
    <h2>Provider Invoice</h2>
    <x-Generic.card :content="$invoice" show="Id|id Path|path ProviderId|provider_id CreatedAt|created_at UpdatedAt|updated_at" route="dashboard.invoices.providers:provider"></x-Generic.card>
@endsection
