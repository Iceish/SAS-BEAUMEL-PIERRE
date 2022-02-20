@extends('web.dashboard.layout')

@section('main')
    <h2>Clients</h2>
    <a class="btn" href="{{ route('dashboard.clients.create') }}">Add a new client</a>
    <x-Table.Table :content="$clients" columns="Name|name Email|email" route="dashboard.clients.show:client"/>
@endsection
