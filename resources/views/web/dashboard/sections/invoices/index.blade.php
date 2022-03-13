@extends('web.dashboard.layout')

@section('tag','invoices')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.invoice', false)) }}</h2>
    <div class="cards">
        <a class="cards__item" href={{ route('dashboard.invoices.clients.index') }}>
            <h3><i class="fa-solid fa-2x fa-cash-register"></i> {{ ucfirst(trans_choice('custom/words.client', true)) }}</h3>
            <p>{{ __('custom/messages.informative.invoice.client') }}</p>
        </a>
        <a class="cards__item" href="{{ route('dashboard.invoices.providers.index') }}">

            <h3><i class="fa-solid fa-2x fa-truck-pickup"></i> {{ ucfirst(trans_choice('custom/words.provider', true)) }}</h3>
            <p>{{ __('custom/messages.informative.invoice.provider') }}</p>
        </a>
    </div>
@endsection
