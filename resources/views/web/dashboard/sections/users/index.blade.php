@extends('web.dashboard.layout')

@section('tag','users')

@section('main')
    <h2>All users</h2>
    <x-Table.Table :content="$users->items()" columns="Name|name Roles|roles:name" route="dashboard.users.show:user"/>
    <a class="btn" href="{{ route('dashboard.users.create') }}">Create a user</a>
@endsection
