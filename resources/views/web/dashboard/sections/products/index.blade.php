@extends('web.dashboard.layout')

@section('main')
    <h2>Products</h2>
    <a class="btn" href="{{ route('dashboard.products.create') }}">Add a new partner</a>
    <x-Table.Table :content="$products" columns="Name|name Quantity|quantity" route="dashboard.products:product" crud="show edit destroy"/>
@endsection
