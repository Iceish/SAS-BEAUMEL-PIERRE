@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ucfirst(__('custom/words.data.crud.editing', ['item'=>trans_choice('custom/words.camera',true)]))}}</h2>

@endsection
