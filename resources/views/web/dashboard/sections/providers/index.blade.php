@extends('web.dashboard.layout')

@section('main')
    <h2>Providers</h2>
    <x-Table.Table :content="$providers" columns="Name|name Email|email" route="dashboard.providers:provider" crud="show edit destroy create"/>
@endsection
