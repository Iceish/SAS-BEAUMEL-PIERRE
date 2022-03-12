@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.client', false)) }}</h2>
    <x-Generic.table :content="$clients" columns="{{ucfirst(__('custom/words.data.input.text.name.label'))}}|name {{ucfirst(__('custom/words.data.input.email.default.label'))}}|email" route="dashboard.clients:client" crud="show edit destroy create search"/>
@endsection
