@extends('web.dashboard.layout')

@section('main')
    <a class="backBtn" href="{{ route('dashboard.providers.index') }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>
    <h2>Provider</h2>
    <a class="btn" href="{{ route('dashboard.providers.edit', ['provider' => $provider->id ]) }}">Edit</a>
    <div>
        <h3>{{ $provider->name }}</h3>
        <ul>
            <li>{{ $provider->id }}</li>
            <li>{{ $provider->email }}</li>
            <li>{{ $provider->address }}</li>
            <li>{{ $provider->city }}</li>
            <li>{{ $provider->postal_code }}</li>
            <li>{{ $provider->created_at }}</li>
            <li>{{ $provider->updated_at }}</li>
        </ul>
    </div>
@endsection
