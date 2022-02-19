@extends('web.dashboard.layout')

@section('tag','users')

@section('main')

    <h2>All users</h2>
    <a class="btn" href="{{ route('dashboard.users.create') }}">Create a user</a>
    <x-Table.Table :content="$users->items()" columns="Id|id name Roles|roles:name" route="dashboard.users.show:user"/>

@endsection
