@extends('web.dashboard.layout')

@section('tag','users')

@section('main')
    <a class="backBtn" href="{{ route('dashboard.users.index') }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>
    <h2>User</h2>
    <x-Generic.card :content="$user" show="Id|id Name|name Email|email EmailVerifiedAt|email_verified_at PostalCode|postal_code City|city Address|address CreatedAt|created_at UpdatedAt|updated_at" route="dashboard.users:user"></x-Generic.card>
@endsection
