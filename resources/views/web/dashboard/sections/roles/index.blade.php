@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.role', false)) }}</h2>
    <x-Generic.Table :content="$roles" columns="{{ ucfirst(__('custom/words.data.input.text.name.label')) }}|name" route="dashboard.roles:role" crud="show edit destroy create search"/>
@endsection
