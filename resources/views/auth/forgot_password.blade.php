@extends('web.static.layout')

@section('main')
    <a class="backBtn" href="{{ route('auth.login') }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>
    <section id="auth">
        <form method="post" action="{{ route("auth.forgotPassword") }}">
            @csrf
            <h4>{{ ucfirst(__('auth.passwordForgotten')) }}</h4>
            <div class="field">
                <label for="emailInput">
                    {{ ucfirst(__("custom/words.data.input.email.default.label")) }}
                </label>
                <input id="emailInput" name="email" type="email" placeholder="{{ __('custom/words.data.input.email.default.placeholder') }}" autocomplete="off"/>
            </div>

            <input class="btn btn--primary" type="submit" value="{{ ucfirst(__("custom/words.data.input.submit.default.label")) }}">
        </form>
    </section>


@endsection
