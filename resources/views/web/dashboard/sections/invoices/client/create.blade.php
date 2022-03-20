@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('custom/words.data.crud.creating', ['item' =>  trans_choice('custom/words.invoice', 1).' '.'('.trans_choice('custom/words.client', 1).')' ] )) }}</h2>
    <x-utils.returnedMessage/>
    <form id="edit" action="{{ route("dashboard.clients.store") }}" method="post">
        @csrf
        <h4>{{ ucfirst(__('custom/words.data.crud.create')) }}</h4>

        <div class="field">
            <label for="totalTTC">{{ ucfirst(__('custom/words.data.input.number.total.label')) }}</label>
            <input type="number" id="totalTTC" name="totalTTC" placeholder="{{ __('custom/words.data.input.number.total.placeholder') }}" value="{{ old('totalTTC') }}"/>
        </div>

        <div class="field">
            <label for="payment_mode">{{ ucfirst(__('custom/words.data.input.text.payment-mode.label')) }}</label>
            <input type="text" id="payment_mode" name="payment_mode" placeholder="{{ __('custom/words.data.input.text.payment-mode.placeholder') }}" value="{{ old('payment_mode') }}"/>
        </div>

        <div class="field">
            <label for="payment_date">{{ ucfirst(__('custom/words.data.input.date.payment.label')) }}</label>
            <input type="date" id="payment_date" name="payment_date" value="{{ old('payment_date') }}"/>
        </div>

        <div class="field">
            <label for="provider">{{ ucfirst(trans_choice('custom/words.client', 1)) }}</label>
            <select id="provider" name="provider_id">
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

