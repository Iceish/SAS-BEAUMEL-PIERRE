@extends('web.dashboard.layout')
@section('tag','roles')


@section('main')

    <x-utils.backBtn/>

    <form action="{{route("dashboard.roles.store")}}" method="POST">
        @csrf
        <div class="field">
            <label for="role_name">Role name</label>
            <input name="role_name" id="role_name" type="text" placeholder="Employee"/>
        </div>
        <div class="category-grid">
            @foreach($permissions->keyBy('name')->keys()->map(function($key, $item){ return explode('.',$key)[0];})->unique() as $permission)
                <x-generic.role :permissions="$permissions" category="{{ $permission }}"></x-generic.role>
            @endforeach
        </div>

        <input class="btn" type="submit">
    </form>
@endsection
