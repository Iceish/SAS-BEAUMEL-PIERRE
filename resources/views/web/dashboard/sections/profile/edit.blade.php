@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ucfirst(__('custom/words.profile'))}}</h2>
    <form action="{{route('dashboard.profile.update')}}" method="post" autocomplete="off">
        @csrf
        @method('put')
        <h4>{{ ucfirst(__('custom/words.data.crud.edit')) }}</h4>

        <div class="field">
            <label for="name">{{ ucfirst(__('custom/words.data.input.text.fullname.label')) }}</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" placeholder="{{ __('custom/words.data.input.text.fullname.placeholder') }}" autocomplete="off" />
        </div>

        <div class="field">
            <label for="email">{{ ucfirst(__('custom/words.data.input.email.default.label')) }}</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" placeholder="{{ __('custom/words.data.input.email.default.placeholder') }}" autocomplete="off" />
        </div>

        <div class="field">
            <label for="city">{{ ucfirst(__('custom/words.data.input.text.city.label')) }}</label>
            <input type="text" id="city" name="city" autocomplete="off" @if($user->city)value="{{ $user->city }}" @else placeholder="{{ucfirst(__('custom/words.data.input.text.city.placeholder'))}}" @endif  />
        </div>

        <div class="field">
            <label for="postal_code">{{ ucfirst(__('custom/words.data.input.number.postal-code.label')) }}</label>
            <input type="text" id="postal_code" name="postal_code" @if($user->postal_code)value="{{ $user->postal_code }}" @else placeholder="{{ucfirst(__('custom/words.data.input.number.postal-code.placeholder'))}}" @endif autocomplete="off" />
        </div>

        <div class="field">
            <label for="address">{{ ucfirst(__('custom/words.data.input.text.address.label')) }}</label>
            <input type="text" id="address" name="address" @if($user->address)value="{{ $user->address }}" @else placeholder="{{ucfirst(__('custom/words.data.input.text.address.placeholder'))}}" @endif autocomplete="off" />
        </div>

        <div class="buttons">
            <x-utils.cancelBtn/>
            <input type="submit" class="btn" value="{{ ucfirst(__('custom/words.data.input.submit.default.label')) }}">
        </div>
    </form>
@endsection
