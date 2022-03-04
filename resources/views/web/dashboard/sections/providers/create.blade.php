@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('text.creating.partner')) }}</h2>

    @foreach ($errors->all() as $error)
        {{$error}}
    @endforeach

    <form id="edit" action="{{ route("dashboard.providers.store") }}" method="post">
        @csrf
        <h4>Create</h4>
        <div class="field">
            <label for="name">{{ ucfirst(__('word.name')) }}</label>
            <input type="text" id="name" name="name" placeholder="John Doe" value="{{ old('name') }}"/>
        </div>

        <div class="field">
            <label for="email">{{ ucfirst(__('word.email')) }}</label>
            <input type="email" id="email" name="email" placeholder="{{ __('form.placeholder.email') }}" value="{{ old('email') }}"/>
        </div>

        <div class="field">
            <label for="address">{{ ucfirst(__('word.address')) }}</label>
            <input type="text" id="address" name="address" placeholder="{{ __('form.placeholder.address') }}" value="{{ old('address') }}"/>
        </div>

        <div class="field">
            <label for="city">{{ ucfirst(__('word.city')) }}</label>
            <input type="text" id="city" name="city" placeholder="{{ __('form.placeholder.city') }}" value="{{ old('city') }}"/>
        </div>

        <div class="field">
            <label for="postal">{{ ucfirst(__('word.postal')) }}</label>
            <input type="number" id="postal" name="postal_code" placeholder="{{ __('form.placeholder.postal') }}" value="{{ old('postal_code') }}"/>
        </div>

        <input class="btn btn--primary" type="submit" value="{{ ucfirst(__('word.confirm')) }}" />
        <p class="caption"><i class="fa-solid fa-circle-exclamation"></i> This action do not create an account.</p>
    </form>
@endsection

