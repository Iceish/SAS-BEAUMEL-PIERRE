@extends('web.dashboard.layout')

@section('tag','users')

@section('main')
    <a class="backBtn" href="{{ route('dashboard.users.index') }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>

    <h2>{{ ucfirst(__('word.user')) }}</h2>

    <div class="card">

        <div class="card__general">
            <img class="avatar" src="{{ asset('img/user.jpg') }}" alt="user" width="96px">
            <p>Approved</p>
        </div>

        <div class="card__header">
            <div>
                <h3>{{ $user->name }}</h3>
                {{ $user->getRoleNames()->first() }}
            </div>
            <a class="btn btn--primary btn--bold" href="{{ route('dashboard.users.edit', ['user' => $user->id]) }}">{{ ucfirst(__('word.edit')) }}</a>
            <form method="post" action="{{ route('dashboard.users.destroy', ['user' => $user->id]) }}">
                @csrf
                @method('DELETE')
                <input class="btn btn--primary btn--bold" type="submit" value="{{ ucfirst(__('word.delete')) }}">
            </form>
        </div>

        <div class="card__description">

            <ul role="list">
                <li>{{ ucfirst(__("word.email")) }} : {{ $user->email }}</li>
                <li>{{ ucfirst(__("word.roles")) }} :
                    @forelse ($user->getRoleNames() as $role)
                        {{ $role }}{{ $loop->last ? "" : "," }}
                    @empty
                        Non renseigné
                    @endforelse
                </li>
                <li>{{ ucfirst(__("text.account_creation_date")) }} : {{ $user->created_at }}</li>
                <li>{{ ucfirst(__("text.email_verification_date")) }} : {{ $user->email_verified_at }}</li>
                <li>{{ ucfirst(__("word.address")) }} :
                    @if($user->address)
                        {{ $user->address }}
                    @else
                        Non renseigné
                    @endif
                </li>

                <li>{{ ucfirst(__("word.postal")) }} :
                    @if($user->postal_code)
                        {{ $user->postal_code }}
                    @else
                        Non renseigné
                    @endif
                </li>
                <li>{{ ucfirst(__("word.city")) }} :
                    @if($user->city)
                        {{ $user->city }}
                    @else
                        Non renseigné
                    @endif</li>
            </ul>

        </div>

    </div>
@endsection
