@extends('web.static.layout')


@section('main')
<section id="auth">
    @csrf
    @error('failed')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <form id="login" action="{{ route("auth.login") }}" method="post">
        @csrf
        <h4>{{ ucfirst(__('custom/words.login')) }}</h4>
        <div class="field">
            <label for="emailInput">
                {{ ucfirst(__('custom/words.data.input.email.default.label')) }}
            </label>
            <input id="emailInput" name="email" type="email" placeholder="{{ __('custom/words.data.input.email.default.placeholder') }}" autocomplete="off"/>
        </div>
        <div class="field">
            <label for="passwordInput">
                {{ ucfirst(__('custom/words.data.input.password.default.label')) }}
            </label>
            <input id="passwordInput" name="password" type="password" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;" autocomplete="off"/>
        </div>
        <div class="field">
            <label for="rememberInput">
                {{ ucfirst(__("auth.remember")) }}
            </label>
            <input id="rememberInput" type="checkbox" name="remember">
        </div>

        <input id="submit" class="btn btn--primary" type="submit" value="{{ ucfirst(__('custom/words.data.input.submit.default.label')) }}">

        <a href="{{ route("auth.forgotPassword.view") }}">{{ucfirst(__("auth.passwordForgotten"))}}</a>
    </form>
</section>
@endsection


