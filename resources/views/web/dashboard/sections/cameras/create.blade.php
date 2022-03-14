@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ucfirst(__('custom/words.data.crud.creating', ['item'=> trans_choice('custom/words.camera',1)]))}}</h2>

    @foreach ($errors->all() as $error)
        {{$error}}
    @endforeach

    <form action="{{ route("dashboard.cameras.store") }}" method="post">
        @csrf
        <h4>{{ucfirst(__('custom/words.data.crud.create'))}}</h4>

        <div class="field">
            <label for="name">{{ ucfirst(__('custom/words.data.input.text.fullname.label')) }}</label>
            <input type="text" id="name" name="name" placeholder="{{ ucfirst(__('custom/words.data.input.text.fullname.placeholder')) }}" value="{{ old('name') }}"/>
        </div>

        <div class="field">
            <label for="ip">{{ucfirst(__('custom/words.data.input.text.ip.label'))}}</label>
            <input type="text" id="ip" name="ip" placeholder="{{ __('custom/words.data.input.text.ip.placeholder') }}" value="{{ old('ip') }}"/>
        </div>

        <div class="field">
            <label for="user_name">{{ucfirst(__('custom/words.data.input.text.username.label'))}}</label>
            <input type="text" id="username" name="username" placeholder="{{ __('custom/words.data.input.text.username.placeholder') }}" value="{{ old('username') }}"/>
        </div>

        <div class="field">
            <label for="password">{{ucfirst(__('custom/words.data.input.password.default.label'))}}</label>
            <input type="password" id="password" name="password" placeholder="{{ __('custom/words.data.input.password.default.placeholder') }}" value="{{ old('password') }}"/>
        </div>

        <div class="field">
            <label for="place">{{ucfirst(__('custom/words.data.input.text.place.label'))}}</label>
            <input type="text" id="place" name="place" placeholder="{{ ucfirst(__('custom/words.data.input.text.place.placeholder')) }}" value="{{ old('place') }}"/>
        </div>
        <x-utils.cancelBtn/>
        <input class="btn" type="submit" value="{{ ucfirst(__('custom/words.data.input.submit.default.label')) }}" />
        <p class="caption"><i class="fa-solid fa-circle-exclamation"></i> {{ucfirst(__('custom/messages.informative.form.camera'))}}</p>
    </form>
@endsection

