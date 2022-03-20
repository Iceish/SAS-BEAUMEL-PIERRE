@extends('web.dashboard.layout')

@section('tag','roles')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.role', 1)) }}</h2>
    <x-utils.returnedMessage/>
    <form id="edit" action="{{ route('dashboard.roles.update',['role'=>$role->id]) }}" method="post">
        @csrf
        @method('put')
        <h4>{{ ucfirst(__('custom/words.data.crud.edit')) }}</h4>
        <div class="field">
            <label for="name">{{ ucfirst(__('custom/words.data.input.text.fullname.label')) }}</label>
            <input type="text" id="name" name="name" value="{{ $role->name }}" placeholder="{{ __('custom/words.data.input.text.fullname.placeholder') }}" />
        </div>

        <div class="category-grid">
            @foreach($permissions->keyBy('name')->keys()->map(function($key, $item){ return explode('.',$key)[0];})->unique() as $permission)
                <x-generic.role :permissions="$permissions" category="{{ $permission }}" :role="$role"></x-generic.role>
            @endforeach
        </div>

        <div class="buttons">
            <x-utils.cancelBtn/>
            <input class="btn" type="submit" value="{{ ucfirst(__('custom/words.data.input.submit.default.label')) }}" />
        </div>
    </form>
@endsection
