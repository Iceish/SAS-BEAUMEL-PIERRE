@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.camera',2)) }}</h2>
    <x-Generic.card :content="$camera" show="{{ucfirst(__('custom/words.data.input.text.ip.label'))}}|ip,{{ucfirst(__('custom/words.data.input.text.fullname.label'))}}|name" route="dashboard.cameras:camera"></x-Generic.card>
@endsection
