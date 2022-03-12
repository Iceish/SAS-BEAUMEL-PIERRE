@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.invoice', true)).' '.'('.trans_choice('custom/words.client', true).')'  }}</h2>

    <x-Generic.card :content="$customerInvoice" show="{{ucfirst(__('word.total_tax'))}}|totalTTC,{{ucfirst(__('word.payment_date'))}}|payment_date,{{ucfirst(__('word.payment_mode'))}}|payment_mode,{{ ucfirst(trans_choice('custom/words.client', true)) }}|client:email" route="dashboard.invoices.clients:client"></x-Generic.card>
@endsection
