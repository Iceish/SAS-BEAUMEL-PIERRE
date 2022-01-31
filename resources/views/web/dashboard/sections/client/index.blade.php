@extends('web.dashboard.layout')

@section('main')
    <p>All users</p>
    @foreach($users as $user)
        {{$user->name}}
        {{$user->email}}
        {{$user->email}}
    @endforeach
@endsection
