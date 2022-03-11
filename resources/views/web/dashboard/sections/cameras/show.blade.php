@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.camera',false)) }}</h2>
    <x-Generic.card :content="$camera" show="{{ucfirst(__('word.ip'))}}|ip  {{ucfirst(__('custom/words.data.input.text.name.label'))}}|name" route="dashboard.cameras:camera"></x-Generic.card>
@endsection
