@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.provider', true)) }}</h2>
    <x-Generic.card :content="$provider" show="{{ ucfirst(__('custom/words.data.input.text.name.label')) }}|name  {{ ucfirst(__('custom/words.data.input.email.default.label')) }}|email" route="dashboard.providers:provider"></x-Generic.card>
@endsection
