@extends('web.dashboard.layout')

@section('tag','roles')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.ticket', 1)) }}</h2>

    <x-Generic.card :content="$ticket" show="{{ ucfirst(__('custom/words.data.input.text.from.label')) }}|from,{{ ucfirst(__('custom/words.data.input.text.subject.label')) }}|subject,{{ ucfirst(__('custom/words.data.input.text.content.label')) }}|content" route="dashboard.roles:role" crud="false"></x-Generic.card>
@endsection
