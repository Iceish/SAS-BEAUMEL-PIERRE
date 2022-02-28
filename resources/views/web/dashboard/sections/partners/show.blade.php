@extends('web.dashboard.layout')

@section('main')
    <a class="backBtn" href="{{ route('dashboard.partners.index') }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>
    <h2>Partner</h2>
    <x-Generic.card :content="$partner" show="Id|id Name|name Email|email PostalCode|postal_code City|city Address|address CreatedAt|created_at UpdatedAt|updated_at" route="dashboard.partners:partner"></x-Generic.card>
@endsection
