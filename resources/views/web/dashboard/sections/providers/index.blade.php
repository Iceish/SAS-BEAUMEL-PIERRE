@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>Providers</h2>
    <x-Generic.Table :content="$providers" columns="Name|name Email|email" route="dashboard.providers:provider" crud="show edit destroy create"/>
@endsection
