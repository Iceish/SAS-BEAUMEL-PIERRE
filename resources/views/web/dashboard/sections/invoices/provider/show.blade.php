@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.invoice', 1)).' '.'('.trans_choice('custom/words.provider', 1).')'  }}</h2>

    <x-Generic.card :content="$invoice" show="{{ ucfirst(__('custom/words.data.input.text.path.label')) }}|path,{{ucfirst(trans_choice('custom/words.provider', 1))}}|provider_id,{{ucfirst(__('custom/words.data.input.date.created.label', ['item' => '']))}}|created_at,{{ucfirst(__('custom/words.data.input.date.updated.label', ['item' => '']))}}|updated_at" route="dashboard.invoices.providers:provider"></x-Generic.card>
@endsection
