@extends('web.static.layout')

@section('main')

<form action="{{route("auth.password-reset")}}" method="post">
    @csrf
    <label for="passwordInput">

    </label>
    <input id="passwordInput" type="password" name="password" required>
    <label for="passwordConfirmationInput">

    </label>
    <input id="passwordConfirmationInput" type="password" name="password_confirmation" required>
    <input name="token" value="{{ $token }}" type="hidden">
    <input type="submit" value="{{ ucfirst(__("custom/words.data.input.submit.default.label")) }}">
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
