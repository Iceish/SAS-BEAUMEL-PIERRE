@extends('web.dashboard.layout')

@section('main')
    <a class="backBtn" href="{{ route('dashboard.vehicles.index') }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>
    <h2>Vehicle</h2>
    <x-Generic.card :content="$vehicle" show="Id|id LicensePlate|license_plate RevisionDate|revision_date Available|available CreatedAt|created_at UpdatedAt|updated_at" route="dashboard.vehicles:vehicle"></x-Generic.card>
@endsection
