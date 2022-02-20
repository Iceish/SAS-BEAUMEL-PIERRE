@extends('web.dashboard.layout')

@section('main')
    <h2>Clients</h2>
    <a class="btn" href="{{ route('dashboard.clients.create') }}">Add a new client</a>
    @foreach($clients as $client)
        <a href="{{ route('dashboard.clients.show', ['client'=> $client->id]) }}">{{ $client->name }}</a>
    @endforeach
@endsection
