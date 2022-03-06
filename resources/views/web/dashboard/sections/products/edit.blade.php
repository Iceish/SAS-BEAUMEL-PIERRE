@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('text.editing.products')) }} {{ $product->name }}</h2>
    <form id="edit" action="{{ route('dashboard.products.update',['product'=>$product->id]) }}" method="post">
        @csrf
        @method('put')
        <h4>Edit</h4>

        <div class="field">
            <label for="name">{{ ucfirst(__('word.name')) }}</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" />
        </div>

        <div class="field">
            <label for="quantity">{{ ucfirst(__('word.quantity')) }}</label>
            <input type="number" id="quantity" name="quantity" value="{{ $product->quantity }}" />
        </div>

        <div class="field">
            <label for="price">{{ ucfirst(__('word.price')) }}</label>
            <input type="number" id="price" name="price" value="{{ $product->price }}" />
        </div>

        <div class="field">
            <label for="image_path">{{ ucfirst(__('word.image_path')) }}</label>
            <input type="text" id="image_path" name="image_path" value="{{ $product->image_path }}" />
        </div>

        <input class="btn btn--primary" type="submit" value="{{ ucfirst(__('word.confirm')) }}" />
    </form>
@endsection
