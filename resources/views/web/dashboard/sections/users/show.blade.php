@extends('web.dashboard.layout')

@section('tag','users')

@section('main')
    <x-utils.backBtn/>
    <h2>User</h2>
    <x-Generic.card :content="$user" show="Id|id Name|name Email|email Roles|roles:name PostalCode|postal_code City|city Address|address EmailVerifiedAt|email_verified_at CreatedAt|created_at UpdatedAt|updated_at" route="dashboard.users:user"></x-Generic.card>
@endsection
