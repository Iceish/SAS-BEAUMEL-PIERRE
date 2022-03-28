@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.vehicle', 2)) }}</h2>
    <x-Generic.Table :content="$vehicles" columns="{{ ucfirst(__('custom/words.data.input.text.fullname.label')) }}|name,{{ ucfirst(__('custom/words.data.input.text.license-plate.label')) }}|licence_plate,{{ ucfirst(__('custom/words.data.input.date.revision.label')) }}|revision_date,{{ ucfirst(__('custom/words.data.input.date.revision.label')) }}|revision_date" route="dashboard.vehicles:vehicle" crud="show edit destroy create search print"/>
@endsection
