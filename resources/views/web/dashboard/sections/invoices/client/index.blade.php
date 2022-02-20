@extends('web.dashboard.layout')

@section('main')
    <a class="backBtn" href="{{ route('dashboard.invoices.index') }}"><i class="fa-solid fa-caret-left fa-3x"></i></a>
    <h2>Client invoices</h2>
@endsection
