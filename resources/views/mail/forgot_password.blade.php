<div>
    Salut {{ $user->name }}
    Lien {{ route("Auth.Password.Reset.View",["token" => $token]) }}
</div>
