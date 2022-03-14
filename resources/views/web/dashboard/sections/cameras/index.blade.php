@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.camera',2)) }}</h2>
    <x-Generic.Table :content="$cameras" columns="{{ ucfirst(__('custom/words.data.input.text.name.label')) }}|name" route="dashboard.cameras:camera" crud="show edit destroy create search"/>
@endsection
