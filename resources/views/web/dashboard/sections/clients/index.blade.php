@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>Clients</h2>
    <x-Generic.table :content="$clients" columns="{{ucfirst(__('word.name'))}}|name {{ucfirst(__('word.email'))}}|email" route="dashboard.clients:client" crud="show edit destroy create"/>
@endsection
