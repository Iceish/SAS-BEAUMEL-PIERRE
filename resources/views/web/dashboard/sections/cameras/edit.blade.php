@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ucfirst(__('custom/words.data.crud.editing', ['item'=> $camera->name ]))}}</h2>

@endsection
