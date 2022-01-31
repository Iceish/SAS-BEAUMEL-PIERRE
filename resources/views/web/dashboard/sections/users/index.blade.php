@extends('web.dashboard.layout')

@section('main')
    <p>All users</p>
    @foreach($users as $user)
        <a href="{{ route('dashboard.users.show', ['user' => $user->id]) }}">{{$user->name}}</a><br>
        {{$user->email}}
        <hr>
        @if($user->hasRole('SuperAdmin'))
            <p>lolll</p>
        @endif
    @endforeach
@endsection
