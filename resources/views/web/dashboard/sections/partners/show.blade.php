@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.partner', 1)) }}</h2>
    <x-Generic.card :content="$partner" show="{{ucfirst(__('custom/words.data.input.text.name.label'))}}|name,{{ucfirst(__('custom/words.data.input.email.default.label'))}}|email,{{ucfirst(__('custom/words.data.input.number.postal-code.label'))}}|postal_code,{{ucfirst(__('custom/words.data.input.text.city.label'))}}|city,{{ucfirst(__('custom/words.data.input.text.address.label'))}}|address" route="dashboard.partners:partner"></x-Generic.card>
@endsection
