@extends('web.dashboard.layout')

@section('main')
    <h2>Roles</h2>
    @foreach($roles as $role)
        {{ $role->name }}
    @endforeach

    <h2>Add new role</h2>
    <a href="{{ route('dashboard.roles.create') }}">Add new role.</a>
@endsection
