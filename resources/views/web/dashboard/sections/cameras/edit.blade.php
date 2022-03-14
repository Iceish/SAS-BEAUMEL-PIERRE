@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ucfirst(__('custom/words.data.crud.editing', ['item'=> $camera->name ]))}}</h2>

    @foreach ($errors->all() as $error)
        {{$error}}
    @endforeach

    <form action="{{ route("dashboard.cameras.update", ['camera' => $camera->id]) }}" method="post">
        @csrf
        @method('put')
        <h4>{{ucfirst(__('custom/words.data.crud.edit'))}}</h4>

        <div class="field">
            <label for="name">{{ ucfirst(__('custom/words.data.input.text.fullname.label')) }}</label>
            <input type="text" id="name" name="name" placeholder="{{ ucfirst(__('custom/words.data.input.text.name.placeholder')) }}" value="{{ $camera->name }}"/>
        </div>

        <div class="field">
            <label for="ip">{{ucfirst(__('custom/words.data.input.text.ip.label'))}}</label>
            <input type="text" id="ip" name="ip" placeholder="{{ __('custom/words.data.input.text.ip.placeholder') }}" value="{{ $camera->ip }}"/>
        </div>

        <div class="field">
            <label for="user_name">{{ucfirst(__('custom/words.data.input.text.username.label'))}}</label>
            <input type="text" id="username" name="username" placeholder="{{ __('custom/words.data.input.text.username.placeholder') }}" value="{{ $camera->username }}"/>
        </div>

        <div class="field">
            <label for="password">{{ucfirst(__('custom/words.data.input.password.default.label'))}}</label>
            <input type="password" id="password" name="password" placeholder="{{ __('custom/words.data.input.password.default.placeholder') }}" value="{{ $camera->password }}"/>
        </div>

        <div class="field">
            <label for="place">{{ucfirst(__('custom/words.data.input.text.place.label'))}}</label>
            <input type="text" id="place" name="place" placeholder="{{ ucfirst(__('custom/words.data.input.text.place.placeholder')) }}" value="{{ $camera->place }}"/>
        </div>

        <input class="btn" type="submit" value="{{ ucfirst(__('custom/words.data.input.submit.default.label')) }}" />
    </form>
@endsection
