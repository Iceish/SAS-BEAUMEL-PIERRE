@extends('web.dashboard.layout')

@section('main')
    <a class="backBtn" href="{{ route('dashboard.products.index') }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>
    <h2>Partner</h2>
    <x-Generic.card :content="$product" show="Id|id Name|name Quantity|quantity ImagePath|image_path Price|price CreatedAt|created_at UpdatedAt|updated_at" route="dashboard.products:product"></x-Generic.card>
@endsection
