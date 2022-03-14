@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.product', 1)) }}</h2>

    <x-Generic.card :content="$product" show="{{ ucfirst(__('custom/words.data.input.text.fullname.label')) }}|name,{{ ucfirst(__('custom/words.data.input.number.quantity.label')) }}|quantity,{{ ucfirst(__('custom/words.data.input.text.image-path.label')) }}|image_path,{{ ucfirst(__('custom/words.data.input.number.price.label')) }}|price" route="dashboard.products:product"></x-Generic.card>
@endsection
