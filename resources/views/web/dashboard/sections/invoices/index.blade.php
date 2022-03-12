@extends('web.dashboard.layout')

@section('tag','invoices')

@section('main')
    <x-utils.backBtn/>
    <a class="btn" href="{{ route('dashboard.invoices.clients.index') }}">{{ ucfirst(trans_choice('custom/words.client', true)) }}</a>
    <a class="btn" href="{{ route('dashboard.invoices.providers.index') }}">{{ ucfirst(trans_choice('custom/words.provider', true)) }}</a>
@endsection
