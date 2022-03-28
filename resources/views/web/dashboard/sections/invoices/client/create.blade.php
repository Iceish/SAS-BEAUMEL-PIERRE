@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('custom/words.data.crud.creating', ['item' =>  trans_choice('custom/words.invoice', 1).' '.'('.trans_choice('custom/words.provider', 1).')' ] )) }}</h2>
    <x-utils.returnedMessage/>
    <form id="edit" action="{{ route("dashboard.invoices.clients.store") }}" method="post" enctype="multipart/form-data">
        @csrf
        <h4>{{ ucfirst(__('custom/words.data.crud.create')) }}</h4>

        <div class="field">
            <label for="file">{{ ucfirst(__('custom/words.data.input.text.file.label')) }}</label>
            <input type="file" id="file" name="file" value="{{ old('file') }}"/>
        </div>

        <div class="field">
            <label for="date">{{ ucfirst(__('custom/words.data.input.date.default.label')) }}</label>
            <input type="date" id="date" name="date" value="{{ old('date') }}"/>
        </div>

        <div class="field">
            <label for="client">{{ ucfirst(trans_choice('custom/words.client', 1)) }}</label>
            <select id="client" name="client_id">
                @foreach($clients as $client)
                    <option value="{{$client->id}}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="buttons">
            <x-utils.cancelBtn/>
            <input class="btn" type="submit" value="{{ ucfirst(__('custom/words.data.input.submit.default.label')) }}" />
        </div>
    </form>
@endsection

