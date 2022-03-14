@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('custom/words.data.crud.creating', ['item' => trans_choice('custom/words.vehicle', 1)])) }}</h2>
    <div>
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    </div>
    <form id="edit" action="{{ route("dashboard.vehicles.store") }}" method="post">
        @csrf
        <h4>{{ ucfirst(__('custom/words.data.crud.create')) }}</h4>

        <div class="field">
            <label for="name">{{ ucfirst(__('custom/words.data.input.text.name.label')) }}</label>
            <input type="text" id="name" name="name" placeholder="{{ __('custom/words.data.input.text.name.placeholder') }}" value="{{ old('name') }}"/>
        </div>

        <div class="field">
            <label for="licence_plate">{{ ucfirst(__('custom/words.data.input.text.license-plate.label')) }}</label>
            <input type="text" id="licence_plate" name="licence_plate" placeholder="{{ __('custom/words.data.input.text.license-plate.placeholder') }}" value="{{ old('licence_plate') }}"/>
        </div>

        <div class="field">
            <label for="revision_date">{{ ucfirst(__('custom/words.data.input.date.revision.label')) }}</label>
            <input type="date" id="revision_date" name="revision_date" value="{{ old('revision_date') }}"/>
        </div>

        <input class="btn btn--primary" type="submit" value="{{ ucfirst(__('custom/words.data.input.submit.default.label')) }}" />
    </form>
@endsection
