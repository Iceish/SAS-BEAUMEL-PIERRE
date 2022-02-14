@extends('web.dashboard.layout')

@section('main')

    <h2>All users</h2>

{{--    <x-CustomTable contentName="users" :content="$users" keys="id/Id name/Name password/Password :getRoleNames/Roles" />--}}
    <x-Table.Table :content="$users->items()" columns="Id|id name Roles|roles:name" route="dashboard.users.show:user"/>

@endsection
