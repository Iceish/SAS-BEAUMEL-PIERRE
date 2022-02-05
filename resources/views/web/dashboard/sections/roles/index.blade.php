@extends('web.dashboard.layout')

@section('main')
    @foreach($roles as $role)
        {{ $role->name }}
    @endforeach
@endsection
