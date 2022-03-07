@extends('web.dashboard.layout')

@section('main')
    <form action="{{route('dashboard.profile.update')}}" method="post">
        @csrf
        @method('put')
        <h4>My profile</h4>

        <div class="field">
            <label for="name">{{ ucfirst(__('word.name')) }}</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" />
        </div>

        <div class="field">
            <label for="email">{{ ucfirst(__('word.email')) }}</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" />
        </div>

        <div class="field">
            <label for="city">{{ ucfirst(__('word.city')) }}</label>
            <input type="text" id="city" name="city" @if($user->city)value="{{ $user->city }}" @else placeholder="{{ucfirst(__('word.not_specified'))}}"@endif />
        </div>

        <div class="field">
            <label for="postal_code">{{ ucfirst(__('word.postal')) }}</label>
            <input type="text" id="postal_code" name="postal_code" @if($user->postal_code)value="{{ $user->postal_code }}" @else placeholder="{{ucfirst(__('word.not_specified'))}}"@endif />
        </div>

        <div class="field">
            <label for="address">{{ ucfirst(__('word.address')) }}</label>
            <input type="text" id="address" name="address" @if($user->address)value="{{ $user->address }}" @else placeholder="{{ucfirst(__('word.not_specified'))}}"@endif />
        </div>
    </form>
@endsection
