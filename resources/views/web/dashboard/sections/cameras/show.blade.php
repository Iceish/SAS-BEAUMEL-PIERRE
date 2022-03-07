@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>Camera</h2>
    <x-Generic.card :content="$camera" show="Id|id Name|name" route="dashboard.cameras:camera"></x-Generic.card>
@endsection
