@extends('web.dashboard.layout')

@section('main')
    <h2>Partners</h2>
    <a class="btn" href="{{ route('dashboard.partners.create') }}">Add a new partner</a>
    <x-Table.Table :content="$partners" columns="Name|name Email|email" route="dashboard.partners.show:partner"/>
@endsection
