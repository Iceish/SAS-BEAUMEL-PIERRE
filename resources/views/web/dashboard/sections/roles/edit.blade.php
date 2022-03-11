@extends('web.dashboard.layout')

@section('tag','roles')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('text.editing.role')) }} {{ $role->name }}</h2>
    <form id="edit" action="{{ route('dashboard.roles.update',['role'=>$role->id]) }}" method="post">
        @csrf
        @method('put')
        <h4>Edit</h4>
        <div class="field">
            <label for="name">{{ ucfirst(__('custom/words.data.input.text.name.label')) }}</label>
            <input type="text" id="name" name="name" value="{{ $role->name }}" />
        </div>

        <div class="category-grid">
            @foreach($permissions->keyBy('name')->keys()->map(function($key, $item){ return explode('.',$key)[0];})->unique() as $permission)
                <x-generic.role :permissions="$permissions" category="{{ $permission }}" :role="$role"></x-generic.role>
            @endforeach
        </div>

        <input class="btn btn--primary" type="submit" value="{{ ucfirst(__('word.confirm')) }}" />
    </form>
@endsection
