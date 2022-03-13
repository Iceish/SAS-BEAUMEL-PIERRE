@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.invoice', 1)).' '.'('.trans_choice('custom/words.client', 1).')'  }}</h2>

    <x-Generic.card :content="$clientInvoice" show="{{ucfirst(__('word.total_tax'))}}|totalTTC,{{ucfirst(__('word.payment_date'))}}|payment_date,{{ucfirst(__('word.payment_mode'))}}|payment_mode,{{ ucfirst(trans_choice('custom/words.client', 1)) }}|client:email" route="dashboard.invoices.clients:client"></x-Generic.card>
@endsection
