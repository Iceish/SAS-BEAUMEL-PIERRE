@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('custom/words.data.crud.editing', ['item' => $vehicle->name ])) }}</h2>
    <x-utils.returnedMessage/>
    <form id="edit" action="{{ route('dashboard.vehicles.update',['vehicle'=>$vehicle->id]) }}" method="post">
        @csrf
        @method('put')
        <h4>{{ ucfirst(__('custom/words.data.crud.edit')) }}</h4>

        <div class="field">
            <label for="name">{{ ucfirst(__('custom/words.data.input.text.fullname.label')) }}</label>
            <input type="text" id="name" name="name" value="{{ $vehicle->name }}" />
        </div>
        <div class="field">
            <label for="licence_plate">{{ ucfirst(__('custom/words.data.input.text.license-plate.label')) }}</label>
            <input type="text" id="licence_plate" name="licence_plate" @if($vehicle->licence_plate)value="{{ $vehicle->licence_plate }}" @else placeholder="{{ __('custom/words.data.input.text.license-plate.placeholder')}}"@endif />
        </div>
        <div class="field">
            <label for="revision_date">{{ ucfirst(__('custom/words.data.input.date.revision.label')) }}</label>
            <input type="date" id="revision_date" name="revision_date" @if($vehicle->revision_date)value="{{ $vehicle->revision_date }}" @else placeholder="{{ __('custom/words.data.input.text.license-plate.placeholder')}}"@endif />
        </div>
        <div class="field">
            <label for="available">{{ ucfirst(__('custom/words.data.input.text.available.label')) }}</label>
            <input type="checkbox" id="available" name="available" value="{{ $vehicle->available }}" />
        </div>

        <div class="buttons">
            <x-utils.cancelBtn/>
            <input class="btn" type="submit" value="{{ ucfirst(__('custom/words.data.input.submit.default.label')) }}" />
        </div>
@endsection
