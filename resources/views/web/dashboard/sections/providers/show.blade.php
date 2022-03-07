@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>Provider</h2>
    <x-Generic.card :content="$provider" show="Name|name  Email|email" route="dashboard.providers:provider"></x-Generic.card>
@endsection
