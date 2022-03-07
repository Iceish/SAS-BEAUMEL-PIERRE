@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>Vehicle</h2>
    <x-Generic.card :content="$vehicle" show="Name|name  LicencePlate|licence_plate  RevisionDate|revision_date  Available|available" route="dashboard.vehicles:vehicle"></x-Generic.card>
@endsection
