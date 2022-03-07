@extends('web.dashboard.layout')

@section('tag','roles')

@section('main')
    <x-utils.backBtn/>
    <h2>Role</h2>
    <x-Generic.card :content="$role" show="Name|name" route="dashboard.roles:role"></x-Generic.card>
@endsection
