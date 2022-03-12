@extends('web.dashboard.layout')

@section('tag','roles')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.role', true)) }}</h2>

    <x-Generic.card :content="$role" show="{{ ucfirst(__('custom/words.data.input.text.name.label')) }}|name" route="dashboard.roles:role"></x-Generic.card>
@endsection
