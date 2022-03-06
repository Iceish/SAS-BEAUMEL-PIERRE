@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>Client Invoice</h2>
    <x-Generic.card :content="$invoice" show="Id|id TotalTTC|totalTTC PaymentDate|payment_date PaymentMode|payment_mode ClientId|client_id CreatedAt|created_at UpdatedAt|updated_at" route="dashboard.invoices.clients:client"></x-Generic.card>
@endsection
