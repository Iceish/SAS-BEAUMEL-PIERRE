@extends('web.dashboard.layout')

@section('main')
    <h2>Partners</h2>
    <x-Table.Table :content="$partners" columns="Name|name Email|email" route="dashboard.partners:partner" crud="show edit destroy create"/>
@endsection
