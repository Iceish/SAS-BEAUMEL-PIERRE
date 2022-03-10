@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>Products</h2>
    <x-Generic.Table :content="$products" columns="Name|name Quantity|quantity" route="dashboard.products:product" crud="show edit destroy create search"/>
@endsection
