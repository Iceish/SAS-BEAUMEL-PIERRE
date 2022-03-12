@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.partner', false)) }}</h2>
    <x-Generic.Table :content="$partners" columns="{{ucfirst(__('custom/words.data.input.text.name.label'))}}|name {{ucfirst(__('custom/words.data.input.email.default.label'))}}|email" route="dashboard.partners:partner" crud="show edit destroy create search"/>
@endsection
