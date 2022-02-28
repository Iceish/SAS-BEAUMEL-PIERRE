@extends('web.dashboard.layout')

@section('main')
    <h2>Vehicles</h2>
    <x-Generic.Table :content="$vehicles" columns="Licence_plate|licence_plate Revision|revision_date" route="dashboard.vehicles:vehicle" crud="show edit destroy create"/>
@endsection
