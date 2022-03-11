@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.camera',true)) }}</h2>
    <x-Generic.Table :content="$cameras" columns="Name|name" route="dashboard.cameras:camera" crud="show edit destroy create search"/>
@endsection
