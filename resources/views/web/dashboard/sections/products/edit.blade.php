@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('custom/words.data.crud.editing', ['item' => $product->name ])) }}</h2>

    <form id="edit" action="{{ route('dashboard.products.update',['product'=>$product->id]) }}" method="post">
        @csrf
        @method('put')
        <h4>{{ ucfirst(__('custom/words.data.crud.edit')) }}</h4>

        <div class="field">
            <label for="name">{{ ucfirst(__('custom/words.data.input.text.fullname.label')) }}</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" placeholder="{{ __('custom/words.data.input.text.name.placeholder') }}"/>
        </div>

        <div class="field">
            <label for="quantity">{{ ucfirst(__('custom/words.data.input.number.quantity.label')) }}</label>
            <input type="number" id="quantity" name="quantity" value="{{ $product->quantity }}" placeholder="{{ __('custom/words.data.input.number.quantity.placeholder') }}"/>
        </div>

        <div class="field">
            <label for="price">{{ ucfirst(__('custom/words.data.input.number.price.label')) }}</label>
            <input type="number" id="price" name="price" value="{{ $product->price }}" placeholder="{{ __('custom/words.data.input.number.price.placeholder') }}"/>
        </div>

        <div class="field">
            <label for="image_path">{{ ucfirst(__('custom/words.data.input.text.image-path.label')) }}</label>
            <input type="text" id="image_path" name="image_path" value="{{ $product->image_path }}" />
        </div>

        <input class="btn btn--primary" type="submit" value="{{ ucfirst(__('custom/words.data.input.submit.default.label')) }}" />
    </form>
@endsection
