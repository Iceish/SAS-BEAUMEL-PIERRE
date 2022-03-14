@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('custom/words.data.crud.creating', ['item' =>  trans_choice('custom/words.invoice', 1).' '.'('.trans_choice('custom/words.provider', 1).')' ] )) }}</h2>
    <div>
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    </div>
    <form id="edit" action="{{ route("dashboard.clients.store") }}" method="post">
        @csrf
        <h4>{{ ucfirst(__('custom/words.data.crud.create')) }}</h4>

        <div class="field">
            <label for="path">{{ ucfirst(__('custom/words.data.input.text.file.label')) }}</label>
            <input type="file" id="path" name="path" placeholder="{{ __('custom/words.data.input.text.path.placeholder') }}" value="{{ old('path') }}"/>
        </div>

        <div class="field">
            <label for="date">{{ ucfirst(__('custom/words.data.input.date.default.label')) }}</label>
            <input type="date" id="date" name="date" value="{{ old('date') }}"/>
        </div>

        <div class="field">
            <label for="provider_id">{{ ucfirst(trans_choice('custom/words.provider', 1)) }}</label>
            <input type="number" id="provider_id" name="provider_id" placeholder="n°2" value="{{ old('provider_id') }}"/>
        </div>

        <input class="btn btn--primary" type="submit" value="{{ ucfirst(__('custom/words.data.input.submit.default.label')) }}" />
    </form>
@endsection
