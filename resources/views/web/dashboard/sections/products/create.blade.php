@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('text.creating.products')) }}</h2>
    <form id="edit" action="{{ route("dashboard.products.store") }}" method="post" enctype="multipart/form-data">
        @csrf
        <h4>Create</h4>

        <div class="field">
            <label for="name">{{ ucfirst(__('custom/words.data.input.text.name.label')) }}</label>
            <input type="text" id="name" name="name" >
        </div>

        <div class="field">
            <label for="quantity">{{ucfirst(__('word.quantity'))}}</label>
            <input type="number" id="quantity" name="quantity" >
        </div>

        <div class="field">
            <label for="price">{{ucfirst(__('word.price'))}}</label>
            <input type="number" id="price" name="price" >
        </div>

        <div class="field">
            <label for="file">{{ucfirst(__('word.image_path'))}}</label>
            <input type="file" id="file" name="file">
        </div>

        <input class="btn btn--primary" type="submit" value="{{ ucfirst(__('word.confirm')) }}" />
    </form>
@endsection

