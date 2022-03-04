@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>Partner</h2>
    <x-Generic.card :content="$product" show="Id|id Name|name Quantity|quantity ImagePath|image_path Price|price CreatedAt|created_at UpdatedAt|updated_at" route="dashboard.products:product"></x-Generic.card>
@endsection
