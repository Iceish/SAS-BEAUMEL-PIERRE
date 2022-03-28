@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.role', 2)) }}</h2>
    <x-Generic.Table :content="$roles" columns="{{ ucfirst(__('custom/words.data.input.text.fullname.label')) }}|name" route="dashboard.roles:role" crud="show edit destroy create search print"/>
@endsection
