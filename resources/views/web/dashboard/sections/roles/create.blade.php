@extends('web.dashboard.layout')
@section('tag','roles')


@section('main')

    <x-utils.backBtn/>

    <form action="{{route("dashboard.roles.store")}}" method="POST">
        @csrf
        <h4>{{ ucfirst(__('custom/words.data.crud.create')) }}</h4>

        <div class="field">
            <label for="role_name">{{ ucfirst(__('custom/words.data.input.text.name.label')) }}</label>
            <input name="role_name" id="role_name" type="text"/>
        </div>
        <div class="category-grid">
            @foreach($permissions->keyBy('name')->keys()->map(function($key, $item){ return explode('.',$key)[0];})->unique() as $permission)
                <x-generic.role :permissions="$permissions" category="{{ $permission }}"></x-generic.role>
            @endforeach
        </div>

        <input class="btn" type="submit" value="{{ ucfirst(__('custom/words.data.input.submit.default.label')) }}">
    </form>
@endsection
