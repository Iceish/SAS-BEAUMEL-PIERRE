@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>Clients</h2>
    <x-Generic.table :content="$clients" columns="Name|name Email|email" route="dashboard.clients:client" crud="show edit destroy create"/>
@endsection
