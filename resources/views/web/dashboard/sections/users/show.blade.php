@extends('web.dashboard.layout')

@section('main')
    @foreach($users as $user)
        {{$user->name}}
        {{$user->email}}
        {{$user->email}}
    @endforeach
@endsection

