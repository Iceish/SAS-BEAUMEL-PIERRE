@extends('web.dashboard.layout')

@section('tag','roles')

@section('main')
    <a class="backBtn" href="{{ route('dashboard.roles.index') }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>

    <h2>{{ ucfirst(__('word.role')) }}</h2>

    <div class="role-grid__card">
        <div class="card__header">
            <div>
                <h3>{{ $role->name }}</h3>
            </div>
            <a class="btn btn--primary btn--bold" href="{{ route('dashboard.roles.edit', ['role' => $role->id]) }}">{{ ucfirst(__('word.edit')) }}</a>

        </div>

        <div class="card__description">

            <ul role="list">
                <li>{{ ucfirst(__("word.name")) }} : {{ $role->name }}</li>
                <li>{{ ucfirst(__("word.roles")) }} :
                    @foreach( $role->permissions as $permission)
                        {{ $permission->name }}{{ $loop->last ? "" : "," }}
                    @endforeach
                </li>
            </ul>

        </div>

    </div>
@endsection
