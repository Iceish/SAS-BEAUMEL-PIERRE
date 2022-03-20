@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('custom/words.data.crud.editing', ['item' =>  trans_choice('custom/words.invoice', 1).' '.'('.trans_choice('custom/words.provider', 1).')' ] )) }}</h2>
    <x-utils.returnedMessage/>
    <form id="edit" action="{{ route("dashboard.invoices.providers.store") }}" method="post" enctype="multipart/form-data">
        @csrf
        <h4>{{ ucfirst(__('custom/words.data.crud.edit')) }}</h4>

        <div class="field">
            <label for="file"><a href="{{asset($providerInvoice->path)}}" download>{{ ucfirst(__('custom/words.data.input.text.file.label')) }}</a></label>
            <input type="file" id="file" name="file"/>
        </div>

        <div class="field">
            <label for="date">{{ ucfirst(__('custom/words.data.input.date.default.label')) }}</label>
            <input type="date" id="date" name="date" value="{{ $providerInvoice->date }}"/>
        </div>

        <div class="field">
            <label for="provider">{{ ucfirst(trans_choice('custom/words.provider', 1)) }}</label>
            <select id="provider" name="provider_id">
                @foreach($providers as $provider)
                    @if($provider->id === $providerInvoice->id)
                        <option value="{{$provider->id}}" selected>{{ $provider->name }}</option>
                    @else
                        <option value="{{$provider->id}}" >{{ $provider->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="buttons">
            <x-utils.cancelBtn/>
            <input class="btn" type="submit" value="{{ ucfirst(__('custom/words.data.input.submit.default.label')) }}" />
        </div>
    </form>
@endsection
