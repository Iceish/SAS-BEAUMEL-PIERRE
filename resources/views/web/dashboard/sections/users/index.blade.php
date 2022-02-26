@extends('web.dashboard.layout')

@section('tag','users')

@section('main')
    <h2>Users</h2>
    <x-Table.Table :content="$users" columns="Name|name Roles|roles:name" route="dashboard.users:user" crud="show edit destroy"/>
    <a class="btn" href="{{ route('dashboard.users.create') }}">Create a user</a>
@endsection
