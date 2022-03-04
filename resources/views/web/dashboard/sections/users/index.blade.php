@extends('web.dashboard.layout')

@section('tag','users')

@section('main')
    <x-utils.backBtn/>
    <h2>Users</h2>
    <x-Generic.Table :content="$users" columns="Name|name Roles|roles:name" route="dashboard.users:user" crud="show edit destroy create"/>
@endsection
