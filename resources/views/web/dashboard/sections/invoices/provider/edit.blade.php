@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('custom/words.data.crud.editing', ['item' =>  trans_choice('custom/words.invoice', 1).' '.'('.trans_choice('custom/words.provider', 1).')' ] )) }}</h2>

@endsection
