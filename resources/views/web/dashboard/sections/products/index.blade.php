@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.product', 2)) }}</h2>
    <x-Generic.Table :content="$products" columns="{{ ucfirst(__('custom/words.data.input.text.fullname.label')) }}|name,{{ ucfirst(__('custom/words.data.input.number.quantity.label')) }}|quantity" route="dashboard.products:product" crud="show edit destroy create search"/>
@endsection
