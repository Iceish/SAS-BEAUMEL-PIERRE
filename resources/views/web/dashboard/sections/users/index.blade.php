@extends('web.dashboard.layout')

@section('main')

    <h2>All users</h2>

{{--    <x-CustomTable contentName="users" :content="$users" keys="id/Id name/Name password/Password :getRoleNames/Roles" />--}}
    <x-Table.Table :content="$users->items()" columns="Id|id name Roles|roles:name" route="dashboard.users.show:user"/>

    <h2>Add new users</h2>
    <a href="{{ route('dashboard.users.create') }}">Add user</a>
@endsection
