@extends('web.dashboard.layout')

@section('main')
    <a class="backBtn" href="{{ route('dashboard.products.index') }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>
    <h2>Product</h2>
    <a class="btn" href="{{ route('dashboard.products.edit', ['product' => $product->id ]) }}">Edit</a>
    <div>
        <h3>{{ $product->name }}</h3>
        <ul>
            <li>{{ $product->name }}</li>
        </ul>
    </div>
@endsection
