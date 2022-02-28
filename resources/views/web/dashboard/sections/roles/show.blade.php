@extends('web.dashboard.layout')

@section('tag','roles')

{{--@foreach( $role->permissions as $permission)--}}
{{--    {{ $permission->name }}{{ $loop->last ? "" : "," }}--}}
{{--@endforeach--}}

@section('main')
    <a class="backBtn" href="{{ route('dashboard.partners.index') }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>
    <h2>Role</h2>
    <x-Generic.card :content="$role" show="Id|id Name|name GuardName|guard_name CreatedAt|created_at UpdatedAt|updated_at" route="dashboard.roles:role"></x-Generic.card>
@endsection
