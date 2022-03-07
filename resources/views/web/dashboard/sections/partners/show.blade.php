@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>Partner</h2>
    <x-Generic.card :content="$partner" show="Name|name  Email|email  PostalCode|postal_code  City|city  Address|address" route="dashboard.partners:partner"></x-Generic.card>
@endsection
