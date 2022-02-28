@extends('web.dashboard.layout')

@section('main')
    <a class="backBtn" href="{{ route('dashboard.providers.index') }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>
    <h2>Provider</h2>
    <x-Generic.card :content="$provider" show="Id|id Name|name Email|email" route="dashboard.providers:provider"></x-Generic.card>
@endsection
