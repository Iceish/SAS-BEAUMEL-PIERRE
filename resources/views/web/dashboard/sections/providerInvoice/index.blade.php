@extends('web.dashboard.layout')

@section('main')
    <p>All users</p>
    @foreach($client as $client)
        {{$user->name}}
        {{$user->email}}
        {{$user->postal_code}}
        {{$user->city}}
    @endforeach
@endsection
