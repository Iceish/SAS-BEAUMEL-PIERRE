@extends('web.dashboard.layout')

@section('main')
    <h2>All Roles</h2>
    <x-Generic.Table :content="$roles" columns="Name|name" route="dashboard.roles:role" crud="show edit destroy create"/>
@endsection
