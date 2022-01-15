<form action="{{route("Auth.Password.Reset")}}" method="post">
    @csrf
    <label for="passwordInput">

    </label>
    <input id="passwordInput" type="password" name="password" required>
    <label for="passwordConfirmationInput">

    </label>
    <input id="passwordConfirmationInput" type="password" name="password_confirmation" required>
    <input name="token" value="{{ $token }}" type="hidden">
    <input type="submit" value="{{ ucfirst(__("word.submit")) }}">
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
