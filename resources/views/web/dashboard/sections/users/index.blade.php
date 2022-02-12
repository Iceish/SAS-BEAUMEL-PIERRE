@extends('web.dashboard.layout')

@section('main')

    <h2>All users</h2>

    <x-CustomTable contentName="users" :content="$users" keys="id/Id name/Name password/Password :getRoleNames/Roles" />


@endsection
