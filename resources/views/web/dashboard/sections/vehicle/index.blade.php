@extends('web.dashboard.layout')

@section('main')
    <h2>Vehicles</h2>
    <a class="btn" href="{{ route('dashboard.vehicles.create') }}">Add a new vehicle</a>
    <x-Table.Table :content="$vehicles" columns="LicencePlate|licence_plate Revision|revision_date" route="dashboard.vehicles.show:vehicle"/>
@endsection
