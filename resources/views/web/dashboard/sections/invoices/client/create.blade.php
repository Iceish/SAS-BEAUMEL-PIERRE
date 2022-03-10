@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>Create client invoice</h2>
    <div>
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    </div>
    <form id="edit" action="{{ route("dashboard.clients.store") }}" method="post">
        @csrf
        <h4>Create</h4>

        <div class="field">
            <label for="totalTTC">TotalTTC</label>
            <input type="number" id="totalTTC" name="totalTTC" placeholder="" value="{{ old('totalTTC') }}"/>
        </div>

        <div class="field">
            <label for="payment_mode">Payment_mode</label>
            <input type="text" id="payment_mode" name="payment_mode" placeholder="" value="{{ old('payment_mode') }}"/>
        </div>

        <div class="field">
            <label for="payment_date">Payment_date</label>
            <input type="date" id="payment_date" name="payment_date" placeholder="" value="{{ old('payment_date') }}"/>
        </div>

        <div class="field">
            <label for="client_id">Client</label>
            <input type="number" id="client_id" name="client_id" placeholder="" value="{{ old('client_id') }}"/>
        </div>

        <input class="btn btn--primary" type="submit" value="{{ ucfirst(__('word.confirm')) }}" />
    </form>
@endsection

