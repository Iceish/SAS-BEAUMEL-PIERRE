@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.invoice', 1)).' '.'('.trans_choice('custom/words.client', 1).')'  }}</h2>

    <div class="generic-card">
        <div class="generic-card__attributes">
            <p><span class="label">{{ucfirst(trans_choice('custom/words.client',1))}}</span>{{$clientInvoice->client->name}}</p>
            <p><span class="label">{{ucfirst(trans_choice('custom/words.data.input.number.total.label',1))}}</span>{{$clientInvoice->totalTTC}}</p>
            <p><span class="label">{{ucfirst(trans_choice('custom/words.data.input.text.payment-mode.label',1))}}</span>{{$clientInvoice->payment_mode}}</p>
            <p><span class="label">{{ucfirst(trans_choice('custom/words.data.input.date.payment.label',1))}}</span>{{$clientInvoice->payment_date}}</p>
            @foreach($clientInvoice->InvoiceDetail as $detail)
                @if($detail->transport)
                    <p><span class="label">{{ucfirst(trans_choice('custom/words.data.input.text.transport.label',1))}}</span>{{$detail->transport}}</p>
                    <p><span class="label">{{ucfirst(trans_choice('custom/words.data.input.text.vat.label',1))}}</span>{{$detail->VAT}}</p>
                    <p><span class="label">{{ucfirst(trans_choice('custom/words.data.input.number.quantity.label',1))}}</span>{{$detail->quantity}}</p>
                    <p><span class="label">{{ucfirst(trans_choice('custom/words.product',1))}}</span>{{$detail->product->name}}</p>
                @endif
            @endforeach
        </div>
    </div>
@endsection
