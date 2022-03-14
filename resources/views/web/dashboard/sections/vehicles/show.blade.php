@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.vehicle', 1)) }}</h2>

    <x-Generic.card :content="$vehicle" show="{{ ucfirst(__('custom/words.data.input.text.fullname.label')) }}|name,{{ ucfirst(__('custom/words.data.input.text.license-plate.label')) }}|licence_plate,{{ ucfirst(__('custom/words.data.input.date.revision.label')) }}|revision_date,{{ ucfirst(__('custom/words.data.input.boolean.available.label')) }}|available" route="dashboard.vehicles:vehicle"></x-Generic.card>
@endsection
