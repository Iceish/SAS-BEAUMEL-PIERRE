@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.ticket', 2)) }}</h2>
    <x-Generic.Table :content="$tickets" columns="{{ ucfirst(trans_choice('custom/words.data.input.text.from.label', 2)) }}|from {{ ucfirst(trans_choice('custom/words.data.input.text.subject.label', 2)) }}|subject" route="dashboard.tickets:ticket" crud="show destroy"/>
@endsection
