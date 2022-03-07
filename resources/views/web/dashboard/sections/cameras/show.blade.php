@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ucfirst(__('word.camera'))}}</h2>
    <x-Generic.card :content="$camera" show="{{ucfirst(__('word.ip'))}}|ip  {{ucfirst(__('word.name'))}}|name" route="dashboard.cameras:camera"></x-Generic.card>
@endsection
