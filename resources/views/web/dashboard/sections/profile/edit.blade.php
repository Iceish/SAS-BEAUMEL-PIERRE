@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ucfirst(__('word.my_profile'))}}</h2>
    <form action="{{route('dashboard.profile.update')}}" method="post" autocomplete="off">
        @csrf
        @method('put')
        <h4>Profile</h4>

        <div class="field">
            <label for="name">{{ ucfirst(__('word.name')) }}</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" autocomplete="off" />
        </div>

        <div class="field">
            <label for="email">{{ ucfirst(__('word.email')) }}</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" autocomplete="off" />
        </div>

        <div class="field">
            <label for="city">{{ ucfirst(__('word.city')) }}</label>
            <input type="text" id="city" name="city" autocomplete="off" @if($user->city)value="{{ $user->city }}" @else placeholder="{{ucfirst(__('word.not_specified'))}}" @endif  />
        </div>

        <div class="field">
            <label for="postal_code">{{ ucfirst(__('word.postal')) }}</label>
            <input type="text" id="postal_code" name="postal_code" @if($user->postal_code)value="{{ $user->postal_code }}" @else placeholder="{{ucfirst(__('word.not_specified'))}}" @endif autocomplete="off" />
        </div>

        <div class="field">
            <label for="address">{{ ucfirst(__('word.address')) }}</label>
            <input type="text" id="address" name="address" @if($user->address)value="{{ $user->address }}" @else placeholder="{{ucfirst(__('word.not_specified'))}}" @endif autocomplete="off" />
        </div>

        <input type="submit" class="btn" value="{{ __('word.submit') }}">
    </form>
@endsection
