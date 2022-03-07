@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>All Tickets</h2>
    <x-Generic.Table :content="$tickets" columns="From|from Subject|subject" route="dashboard.tickets:ticket" crud="show destroy"/>
@endsection