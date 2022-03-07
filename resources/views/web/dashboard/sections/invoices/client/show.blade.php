@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>Client Invoice</h2>
    <x-Generic.card :content="$customerInvoice" show="{{ucfirst(__('word.total_tax'))}}|totalTTC  {{ucfirst(__('word.payment_date'))}}|payment_date  {{ucfirst(__('word.payment_mode'))}}|payment_mode  Client|client:email" route="dashboard.invoices.clients:client"></x-Generic.card>
@endsection
