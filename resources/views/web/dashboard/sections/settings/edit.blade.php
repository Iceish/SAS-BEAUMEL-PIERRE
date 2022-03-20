@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.setting', 2)) }}</h2>
    <x-utils.returnedMessage/>
@endsection
