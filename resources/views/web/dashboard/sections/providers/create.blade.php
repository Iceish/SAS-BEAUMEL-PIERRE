@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('custom/words.data.crud.creating', ['item' => trans_choice('custom/words.provider',true)])) }}</h2>

    @foreach ($errors->all() as $error)
        {{$error}}
    @endforeach

    <form id="edit" action="{{ route("dashboard.providers.store") }}" method="post">
        @csrf
        <h4>{{ ucfirst(__('custom/words.data.crud.create')) }}</h4>

        <div class="field">
            <label for="name">{{ ucfirst(__('custom/words.data.input.text.fullname.label')) }}</label>
            <input type="text" id="name" name="name" placeholder="John Doe" value="{{ old('name') }}"/>
        </div>

        <div class="field">
            <label for="email">{{ ucfirst(__('custom/words.data.input.email.default.label')) }}</label>
            <input type="email" id="email" name="email" placeholder="{{ __('custom/words.data.input.email.default.placeholder') }}" value="{{ old('email') }}"/>
        </div>

        <div class="field">
            <label for="address">{{ ucfirst(__('custom/words.data.input.text.address.label')) }}</label>
            <input type="text" id="address" name="address" placeholder="{{ __('custom/words.data.input.text.address.placeholder') }}" value="{{ old('address') }}"/>
        </div>

        <div class="field">
            <label for="city">{{ ucfirst(__('custom/words.data.input.text.city.label')) }}</label>
            <input type="text" id="city" name="city" placeholder="{{ __('custom/words.data.input.text.city.placeholder') }}" value="{{ old('city') }}"/>
        </div>

        <div class="field">
            <label for="postal">{{ ucfirst(__('custom/words.data.input.number.postal-code.label')) }}</label>
            <input type="number" id="postal" name="postal_code" placeholder="{{ __('custom/words.data.input.number.postal-code.placeholder') }}" value="{{ old('postal_code') }}"/>
        </div>

        <div class="field">
            <label for="tel">{{ ucfirst(__('custom/words.data.input.text.tel.label')) }}</label>
            <input type="text" id="tel" name="tel" placeholder="{{ __('custom/words.data.input.text.tel.placeholder') }}" value="{{ old('tel') }}"/>
        </div>

        <div class="buttons">
            <x-utils.cancelBtn/>
            <input class="btn" type="submit" value="{{ ucfirst(__('custom/words.data.input.submit.default.label')) }}" />
        </div>

        <p class="caption"><i class="fa-solid fa-circle-exclamation"></i> {{ __('custom/messages.informative.form.provider') }}</p>
    </form>
@endsection

