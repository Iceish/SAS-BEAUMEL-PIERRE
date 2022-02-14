@extends('web.static.layout')
@section('main')

@error('failed')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<form action="{{ route("auth.login") }}" method="post" id="loginform" >
    @csrf
    <div>
        <label for="emailInput">
            {{ ucfirst(__("word.email")) }}
        </label>
        <input id="emailInput" name="email" type="email" placeholder="{{__("word.email")}}"/>
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="passwordInput">
            {{ ucfirst(__("word.password")) }}
        </label>
        <input id="passwordInput" name="password" type="password" placeholder="{{__("word.password")}}"/>
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="rememberInput">
            {{ ucfirst(__("auth.remember")) }}
        </label>
        <input id="rememberInput" type="checkbox" name="remember">
    </div>

    <input id="submit" type="submit" value="{{ ucfirst(__("word.submit")) }}">

    <div>
        <a href="{{ route("auth.forgotPassword.view") }}">{{__("auth.passwordForgotten")}}</a>
    </div>
</form>
@endsection


