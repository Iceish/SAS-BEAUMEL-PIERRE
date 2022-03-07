@extends('web.dashboard.layout')

@section('main')
    <h2>Partners</h2>
    <x-Generic.Table :content="$partners" columns="Name|name Email|email" route="dashboard.partners:partner" crud="show edit destroy create search"/>
@endsection
