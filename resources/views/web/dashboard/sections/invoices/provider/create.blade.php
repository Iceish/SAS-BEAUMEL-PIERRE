@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>Create client invoice</h2>
    <div>
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    </div>
    <form id="edit" action="{{ route("dashboard.clients.store") }}" method="post">
        @csrf
        <h4>Create</h4>

        <div class="field">
            <label for="path">Path</label>
            <input type="text" id="path" name="path" placeholder="" value="{{ old('path') }}"/>
        </div>

        <div class="field">
            <label for="date">date</label>
            <input type="date" id="date" name="date" placeholder="" value="{{ old('date') }}"/>
        </div>

        <div class="field">
            <label for="provider_id">Provider</label>
            <input type="number" id="provider_id" name="provider_id" placeholder="" value="{{ old('provider_id') }}"/>
        </div>

        <input class="btn btn--primary" type="submit" value="{{ ucfirst(__('word.confirm')) }}" />
    </form>
@endsection
