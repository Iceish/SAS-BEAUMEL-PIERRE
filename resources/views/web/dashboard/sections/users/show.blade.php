@extends('web.dashboard.layout')

@section('main')
    <p>Only one user here.</p>
    {{ $user->email }}
    @foreach($user->getRoleNames() as $role)
        {{ $role }}
    @endforeach

    @foreach($roles as $role)
        {{ $role }}
    @endforeach
@endsection

