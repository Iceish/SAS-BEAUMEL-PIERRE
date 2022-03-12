@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('custom/words.data.crud.editing', ['item' =>  trans_choice('custom/words.invoice', true).' '.'('.trans_choice('custom/words.provider', true).')' ] )) }}</h2>

@endsection
