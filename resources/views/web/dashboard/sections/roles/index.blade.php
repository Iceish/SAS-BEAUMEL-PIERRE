@extends('web.dashboard.layout')

@section('main')
    <h2>All Roles</h2>
    <x-Table.Table :content="$roles" columns="Name|name" route="dashboard.roles.show:role"/>
    <a class="btn" href="{{ route('dashboard.roles.create') }}">Create a role</a>
@endsection
