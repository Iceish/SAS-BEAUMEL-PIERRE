@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>Vehicles</h2>
    <x-Generic.Table :content="$vehicles" columns="Name|name Licence_plate|licence_plate Revision|revision_date" route="dashboard.vehicles:vehicle" crud="show edit destroy create search"/>
@endsection
