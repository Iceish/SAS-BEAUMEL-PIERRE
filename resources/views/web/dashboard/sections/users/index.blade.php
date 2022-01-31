@extends('web.dashboard.layout')

@section('main')
    <p>All users</p>
    @foreach($users as $user)
        {{$user->name}}<br>
        {{$user->email}}
        <hr>
    @endforeach
@endsection
