@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('text.creating.vehicle')) }}</h2>
    <div>
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    </div>
    <form id="edit" action="{{ route("dashboard.vehicles.store") }}" method="post">
        @csrf
        <h4>Create</h4>
        <div class="field">
            <label for="name">{{ ucfirst(__('word.name')) }}</label>
            <input type="text" id="name" name="name" placeholder="Camion benne 26t" value="{{ old('name') }}"/>
        </div>

        <div class="field">
            <label for="licence_plate">{{ ucfirst(__('word.licence_plate')) }}</label>
            <input type="text" id="licence_plate" name="licence_plate" placeholder="AK-124-FD" value="{{ old('licence_plate') }}"/>
        </div>

        <div class="field">
            <label for="revision_date">{{ ucfirst(__('word.revision_date')) }}</label>
            <input type="date" id="revision_date" name="revision_date" placeholder="15/04/2022" value="{{ old('revision_date') }}"/>
        </div>

        <input class="btn btn--primary" type="submit" value="{{ ucfirst(__('word.confirm')) }}" />
    </form>
@endsection
