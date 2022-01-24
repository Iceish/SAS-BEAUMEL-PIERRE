@extends('web.dashboard.layout')

@section('main')
    <p>Only one user here.</p>
    {{ $user->email }}
@endsection

