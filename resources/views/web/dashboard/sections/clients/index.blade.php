@extends('web.dashboard.layout')

@section('main')
    <h2>Clients</h2>
    <x-Table.Table :content="$clients" columns="Name|name Email|email" route="dashboard.clients:client" crud="show edit destroy create"/>
@endsection
