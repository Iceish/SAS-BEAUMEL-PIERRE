<form method="post" action="{{ route("auth.forgotPassword") }}">
    @csrf
    <div>
        <label for="emailInput">
            {{ ucfirst(__("word.email")) }}
        </label>
        <input id="emailInput" name="email" type="email" placeholder="{{__("word.email")}}"/>
    </div>

    <input type="submit" value="{{ ucfirst(__("word.submit")) }}">
</form>
