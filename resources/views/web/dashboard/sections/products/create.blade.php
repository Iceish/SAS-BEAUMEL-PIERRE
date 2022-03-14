@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('custom/words.data.crud.creating', ['item' => trans_choice('custom/words.product', true)])) }}</h2>
    <form id="edit" action="{{ route("dashboard.products.store") }}" method="post" enctype="multipart/form-data">
        @csrf
        <h4>{{ ucfirst(__('custom/words.data.crud.create')) }}</h4>

        <div class="field">
            <label for="name">{{ ucfirst(__('custom/words.data.input.text.fullname.label')) }}</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="{{ __('custom/words.data.input.text.name.placeholder') }}">
        </div>

        <div class="field">
            <label for="quantity">{{ucfirst(__('custom/words.data.input.number.quantity.label'))}}</label>
            <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" placeholder="{{ __('custom/words.data.input.number.quantity.placeholder') }}" >
        </div>

        <div class="field">
            <label for="price">{{ucfirst(__('custom/words.data.input.number.price.label'))}}</label>
            <input type="number" id="price" name="price" value="{{ old('price') }}" placeholder="{{ __('custom/words.data.input.number.price.placeholder') }}">
        </div>

        <div class="field">
            <label for="file">{{ucfirst(__('custom/words.data.input.text.image-path.label'))}}</label>
            <input type="file" id="file" name="file" value="{{ old('file') }}">
        </div>

        <input class="btn btn--primary" type="submit" value="{{ ucfirst(__('custom/words.data.input.submit.default.label')) }}" />
    </form>
@endsection

