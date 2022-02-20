@extends('web.dashboard.layout')

@section('main')
    <a class="backBtn" href="{{ route('dashboard.partners.index') }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>
    <h2>Partner</h2>
    <a class="btn" href="{{ route('dashboard.partners.edit', ['partner' => $partner->id ]) }}">Edit</a>
    <div>
        <h3>{{ $partner->name }}</h3>
        <ul>
            <li>{{ $partner->id }}</li>
            <li>{{ $partner->email }}</li>
            <li>{{ $partner->address }}</li>
            <li>{{ $partner->city }}</li>
            <li>{{ $partner->postal_code }}</li>
            <li>{{ $partner->created_at }}</li>
            <li>{{ $partner->updated_at }}</li>
        </ul>
    </div>
@endsection
