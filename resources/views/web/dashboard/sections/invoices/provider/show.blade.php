@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(trans_choice('custom/words.invoice', 1)).' '.'('.trans_choice('custom/words.provider', 1).')'  }}</h2>

    <div class="generic-card">
        <div class="generic-card__attributes">
            <p><span class="label">{{ucfirst(trans_choice('custom/words.invoice',1))}}</span><a href="{{asset($providerInvoice->path)}}" download>Votre facture</a></p>
            <p><span class="label">{{ucfirst(trans_choice('custom/words.provider',1))}}</span>{{$providerInvoice->provider->name}}</p>
            <p><span class="label">{{ucfirst(__('custom/words.data.input.date.created.label',["item"=>trans_choice('custom/words.invoice',1)]))}}</span>{{$providerInvoice->date}}</p>
        </div>
    </div>
@endsection
