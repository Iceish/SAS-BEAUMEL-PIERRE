@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>Partner</h2>
    <x-Generic.card :content="$product" show="Name|name  Quantity|quantity  ImagePath|image_path  Price|price" route="dashboard.products:product"></x-Generic.card>
@endsection
