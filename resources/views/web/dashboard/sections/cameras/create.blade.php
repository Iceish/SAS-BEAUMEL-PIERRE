@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>Cameras</h2>

    @foreach ($errors->all() as $error)
        {{$error}}
    @endforeach

    <form id="edit" action="{{ route("dashboard.cameras.store") }}" method="post">
        @csrf
        <h4>Create</h4>
        <div class="field">
            <label for="name">{{ ucfirst(__('word.name')) }}</label>
            <input type="text" id="name" name="name" placeholder="John Doe" value="{{ old('name') }}"/>
        </div>

        <div class="field">
            <label for="ip">Ip</label>
            <input type="text" id="ip" name="ip" placeholder="" value="{{ old('ip') }}"/>
        </div>

        <div class="field">
            <label for="user_name">User_name</label>
            <input type="text" id="user_name" name="user_name" placeholder="" value="{{ old('user_name') }}"/>
        </div>

        <div class="field">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="" value="{{ old('password') }}"/>
        </div>

        <div class="field">
            <label for="place">Place</label>
            <input type="text" id="place" name="place" placeholder="" value="{{ old('place') }}"/>
        </div>

        <input class="btn btn--primary" type="submit" value="{{ ucfirst(__('word.confirm')) }}" />
        <p class="caption"><i class="fa-solid fa-circle-exclamation"></i> This action do not connect camera on website.</p>
    </form>
@endsection

