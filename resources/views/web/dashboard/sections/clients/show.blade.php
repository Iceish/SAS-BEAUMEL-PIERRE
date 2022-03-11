@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>Client</h2>
    <x-Generic.card :content="$client" show="{{ucfirst(__('custom/words.data.input.text.name.label'))}}|name  {{ucfirst(__('word.email'))}}|email  {{ucfirst(__('word.postal'))}}|postal_code  {{ucfirst(__('word.city'))}}|city  {{ucfirst(__('word.address'))}}|address" route="dashboard.clients:client"></x-Generic.card>
@endsection
