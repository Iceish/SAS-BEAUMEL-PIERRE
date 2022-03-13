@extends('web.dashboard.layout')

@section('tag','users')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.user', 1)) }}</h2>
    <x-Generic.card :content="$user" show="{{ ucfirst(__('custom/words.data.input.number.id.label')) }}|id,{{ ucfirst(__('custom/words.data.input.text.name.label')) }}|name,{{ucfirst(__('custom/words.data.input.email.default.label'))}}|email,{{ucfirst(trans_choice('custom/words.role', 2))}}|roles:name,{{ucfirst(__('custom/words.data.input.number.postal-code.label'))}}|postal_code,{{ucfirst(__('custom/words.data.input.text.city.label')) }}|city,{{ucfirst(__('custom/words.data.input.text.address.label'))}}|address,{{ucfirst(__('custom/words.data.input.date.verified.label', ['item' => trans_choice('custom/words.data.input.email.default.label', 1)]))}}|email_verified_at,{{ucfirst(__('custom/words.data.input.date.created.label', ['item' => trans_choice('custom/words.data.input.email.default.label', 1)]))}}|created_at,{{ucfirst(__('custom/words.data.input.date.updated.label',['item' => trans_choice('custom/words.data.input.email.default.label', 1)]))}}|updated_at" route="dashboard.users:user"></x-Generic.card>
@endsection
