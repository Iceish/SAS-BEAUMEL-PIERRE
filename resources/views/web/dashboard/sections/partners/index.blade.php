@extends('web.dashboard.layout')

@section('main')
    <h2>Partners</h2>
    <a class="btn" href="{{ route('dashboard.partners.create') }}">Add a new partner</a>
    @foreach($partners as $partner)
        <a href="{{ route('dashboard.partners.show', ['partner'=> $partner->id]) }}">{{ $partner->name }}</a>
    @endforeach
@endsection
