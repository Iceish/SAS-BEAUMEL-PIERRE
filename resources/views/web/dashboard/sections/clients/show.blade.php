@extends('web.dashboard.layout')

@section('main')
    <a class="backBtn" href="{{ route('dashboard.clients.index') }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>
    <h2>Client</h2>
    <x-Generic.card :content="$client" show="Id|id Name|name Email|email PostalCode|postal_code City|city Address|address CreatedAt|created_at UpdatedAt|updated_at" route="dashboard.clients:client"></x-Generic.card>
@endsection
