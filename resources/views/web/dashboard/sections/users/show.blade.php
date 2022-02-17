@extends('web.dashboard.layout')

@section('tag','users')

@section('main')
    <a class="backBtn" href="{{ route('dashboard.users.index') }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>

    <h2>{{ ucfirst(__('word.user')) }}</h2>

    <div class="card">

        <div class="card__general">
            <img src="{{ asset('img/user.jpg') }}" alt="user" width="96px">
            <p>Approved</p>
        </div>

        <div class="card__header">
            <div>
                <h3>{{ $user->name }}</h3>
                {{ $user->getRoleNames()->first() }}
            </div>
            <a class="btn btn--primary btn--bold" href="{{ route('dashboard.users.edit', ['user' => $user->id]) }}">{{ ucfirst(__('word.edit')) }}</a>

        </div>

        <div class="card__description">

            <ul role="list">
                <li>{{ ucfirst(__("word.email")) }} : {{ $user->email }}</li>
                <li>{{ ucfirst(__("word.roles")) }} :
                    @foreach( $user->getRoleNames() as $role)
                        {{ $role }}{{ $loop->last ? "" : "," }}
                    @endforeach
                </li>
                <li>{{ ucfirst(__("text.account_creation_date")) }} : {{ $user->created_at }}</li>
                <li>{{ ucfirst(__("text.email_verification_date")) }} : {{ $user->email_verified_at }}</li>
            </ul>

        </div>

    </div>
@endsection
