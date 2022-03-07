@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('text.editing_vehicle')) }} {{ $vehicle->name }}</h2>
    <form id="edit" action="{{ route('dashboard.vehicles.update',['vehicle'=>$vehicle->id]) }}" method="post">
        @csrf
        @method('put')
        <h4>Edit</h4>
        <div class="field">
            <label for="name">{{ ucfirst(__('word.name')) }}</label>
            <input type="text" id="name" name="name" value="{{ $vehicle->name }}" />
        </div>
        <div class="field">
            <label for="licence_plate">{{ ucfirst(__('word.licence_plate')) }}</label>
            <input type="text" id="licence_plate" name="licence_plate" @if($vehicle->licence_plate)value="{{ $vehicle->licence_plate }}" @else placeholder="{{ucfirst(__('word.not_specified'))}}"@endif />
        </div>
        <div class="field">
            <label for="revision_date">{{ ucfirst(__('word.revision_date')) }}</label>
            <input type="date" id="revision_date" name="revision_date" @if($vehicle->revision_date)value="{{ $vehicle->revision_date }}" @else placeholder="{{ucfirst(__('word.not_specified'))}}"@endif />
        </div>

        <input class="btn btn--primary" type="submit" value="{{ ucfirst(__('word.confirm')) }}" />
@endsection
