@extends('web.dashboard.layout')

@section('tag','home')

@section('main')
    <h2>{{ \Carbon\Carbon::greet(Auth::user()->name) }}</h2>
    <div class="dashboard">
        <div class="dashboard__owner">
            <h3>{{ __('custom/messages.informative.dashboard.admin') }}</h3>
            <x-Generic.card :content="$superadmin->first()" show="{{ ucfirst(__('custom/words.data.input.text.name.label')) }}|name,{{ucfirst(__('custom/words.data.input.email.default.label'))}}|email" route="dashboard.users:user" crud="false" ></x-Generic.card>
        </div>
    </div>
@endsection
