@extends('web.dashboard.layout')

@section('tag','roles')

{{--@foreach( $role->permissions as $permission)--}}
{{--    {{ $permission->name }}{{ $loop->last ? "" : "," }}--}}
{{--@endforeach--}}

@section('main')
    <x-utils.backBtn/>
    <h2>Role</h2>
    <x-Generic.card :content="$role" show="Id|id Name|name GuardName|guard_name CreatedAt|created_at UpdatedAt|updated_at" route="dashboard.roles:role"></x-Generic.card>
@endsection
