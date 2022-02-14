@extends('web.dashboard.layout')

@section('main')
    <h2>User</h2>

    <div class="card">
        <div class="card__general">
            <img src="{{ asset('img/user.jpg') }}" alt="user" width="96px">
        </div>
        <div class="card__header">
            {{ $user->name }}
            {{ $user->getRoleNames()->first() }}
            <button>Edit</button>
        </div>
        <div class="card__description">desc</div>
    </div>
@endsection

