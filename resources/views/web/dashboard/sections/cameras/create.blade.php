@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ucfirst(__('word.cameras'))}}</h2>

    @foreach ($errors->all() as $error)
        {{$error}}
    @endforeach

    <form id="edit" action="{{ route("dashboard.cameras.store") }}" method="post">
        @csrf
        <h4>{{ucfirst(__('word.create'))}}</h4>
        <div class="field">
            <label for="name">{{ ucfirst(__('word.name')) }}</label>
            <input type="text" id="name" name="name" placeholder="John Doe" value="{{ old('name') }}"/>
        </div>

        <div class="field">
            <label for="ip">{{ucfirst(__('word.ip'))}}</label>
            <input type="text" id="ip" name="ip" placeholder="" value="{{ old('ip') }}"/>
        </div>

        <div class="field">
            <label for="user_name">{{ucfirst(__('validation.attributes.username'))}}</label>
            <input type="text" id="user_name" name="user_name" placeholder="" value="{{ old('user_name') }}"/>
        </div>

        <div class="field">
            <label for="password">{{ucfirst(__('word.password'))}}</label>
            <input type="password" id="password" name="password" placeholder="" value="{{ old('password') }}"/>
        </div>

        <div class="field">
            <label for="place">{{ucfirst(__('word.place'))}}</label>
            <input type="text" id="place" name="place" placeholder="" value="{{ old('place') }}"/>
        </div>

        <input class="btn btn--primary" type="submit" value="{{ ucfirst(__('word.confirm')) }}" />
        <p class="caption"><i class="fa-solid fa-circle-exclamation"></i>{{ucfirst(__('text.camera_info'))}}</p>
    </form>
@endsection

