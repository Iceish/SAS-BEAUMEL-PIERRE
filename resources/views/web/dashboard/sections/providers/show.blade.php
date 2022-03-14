@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.provider', 1)) }}</h2>
    <x-Generic.card :content="$provider" show="{{ ucfirst(__('custom/words.data.input.text.fullname.label')) }}|name,{{ ucfirst(__('custom/words.data.input.email.default.label')) }}|email,{{ ucfirst(__('custom/words.data.input.text.tel.label')) }}|tel" route="dashboard.providers:provider"></x-Generic.card>
@endsection
