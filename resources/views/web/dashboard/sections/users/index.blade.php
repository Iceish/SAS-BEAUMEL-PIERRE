@extends('web.dashboard.layout')

@section('tag','users')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.user', false)) }}</h2>
    <x-Generic.Table :content="$users" columns="{{ ucfirst(__('custom/words.data.input.text.name.label')) }}|name {{ ucfirst(trans_choice('custom/words.role', false)) }}|roles:name" route="dashboard.users:user" crud="show edit destroy create search"/>
@endsection
