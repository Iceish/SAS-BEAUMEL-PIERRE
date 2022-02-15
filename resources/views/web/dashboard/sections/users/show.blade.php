@extends('web.dashboard.layout')

@section('tag','users')

@section('main')
    <a class="backBtn" href="{{ route('dashboard.users.index') }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>

    <h2>User</h2>

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
            <a class="btn btn--primary btn--bold" href="{{ route('dashboard.users.edit', ['user' => $user->id]) }}">Edit</a>

        </div>

        <div class="card__description">

            <ul role="list">
                <li>Email : {{ $user->email }}</li>
                <li>Roles :
                    @foreach( $user->getRoleNames() as $role)
                        {{ $role }},
                    @endforeach
                </li>
                <li>Account creation date : {{ $user->created_at }}</li>
                <li>Email verified date : {{ $user->email_verified_at }}</li>
            </ul>

        </div>

    </div>
@endsection
