@extends('web.dashboard.layout')

@section('tag','roles')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.role', 1)) }}</h2>

    <x-Generic.card :content="$role" show="{{ ucfirst(__('custom/words.data.input.text.fullname.label')) }}|name" route="dashboard.roles:role"></x-Generic.card>
@endsection
