@extends('web.dashboard.layout')

@section('main')
    <x-utils.backBtn/>
    <h2>{{ ucfirst(__('custom/words.data.crud.creating', ['item' =>  trans_choice('custom/words.invoice', 1).' '.'('.trans_choice('custom/words.client', 1).')' ] )) }}</h2>
    <x-utils.returnedMessage/>
    <form id="edit" action="{{ route("dashboard.invoices.clients.store") }}" method="post">
        @csrf
        <h4>{{ ucfirst(__('custom/words.data.crud.create')) }}</h4>

        <div class="field">
            <label for="totalTTC">{{ ucfirst(__('custom/words.data.input.number.total.label')) }}</label>
            <input type="number" id="totalTTC" name="totalTTC" placeholder="{{ __('custom/words.data.input.number.total.placeholder') }}" value="{{ old('totalTTC') }}"/>
        </div>

        <div class="field">
            <label for="payment_mode">{{ ucfirst(__('custom/words.data.input.text.payment-mode.label')) }}</label>
            <input type="text" id="payment_mode" name="payment_mode" placeholder="{{ __('custom/words.data.input.text.payment-mode.placeholder') }}" value="{{ old('payment_mode') }}"/>
        </div>

        <div class="field">
            <label for="payment_date">{{ ucfirst(__('custom/words.data.input.date.payment.label')) }}</label>
            <input type="date" id="payment_date" name="payment_date" value="{{ old('payment_date') }}"/>
        </div>

        <div class="field">
            <label for="client">{{ ucfirst(trans_choice('custom/words.client', 1)) }}</label>
            <select id="client" name="client_id">
                @foreach($clients as $client)
                    <option value="{{$client->id}}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>
        <div id="productList" style="width: 100%">

        </div>
        <div class="field">
            <label for="products">{{ ucfirst(trans_choice('custom/words.product', 1)) }}</label>
            <select id="products">
                @foreach($products as $product)
                    <option value="{{$product->id}}">{{ $product->name }}</option>
                @endforeach
            </select>
            <input type="submit" id="addProduct" class="btn" value="add"/>
        </div>
        <div class="buttons">
            <x-utils.cancelBtn/>
            <input class="btn" type="submit" value="{{ ucfirst(__('custom/words.data.input.submit.default.label')) }}" />
        </div>
    </form>
@endsection

@push('js')
    <script>
        let productList = document.querySelector('#productList');
        let btnProduct = document.querySelector('#addProduct');
        let nbProducts = 0;
        btnProduct.addEventListener('click',function (event) {
            event.preventDefault();
            let product = document.querySelector('#products');
            product = product.options[product.selectedIndex];
            let field = document.createElement("div");
            let quantity = document.createElement("input");
            let vat = document.createElement("input");
            let transport = document.createElement("input");
            let label = document.createElement("label");
            let div = document.createElement("div");
            let btnDelete = document.createElement("button");

            div.setAttribute('id','product-'+nbProducts);
            quantity.setAttribute('type','number');
            quantity.setAttribute('placeholder','{{ucfirst(__('custom/words.data.input.number.quantity.label'))}}');
            quantity.setAttribute('name','products['+product.value+'][quantity]');

            vat.setAttribute('type','number');
            vat.setAttribute('step','.01');
            vat.setAttribute('placeholder','tva');
            vat.setAttribute('name','products['+product.value+'][vat]');
            vat.setAttribute('value','{{ $vat }}');

            transport.setAttribute('type','text');
            transport.setAttribute('placeholder','transport');
            transport.setAttribute('name','products['+product.value+'][transport]');

            label.setAttribute('for','product-'+nbProducts);
            label.innerText = product.innerText;

            field.setAttribute('class','field');

            btnDelete.innerText = 'Delete'
            btnDelete.addEventListener('click',(event)=>{
                event.preventDefault();
                event.target.parentNode.parentNode.remove();
            })

            field.append(label);
            div.append(quantity);
            div.append(vat);
            div.append(transport);
            div.append(btnDelete)
            field.append(div);
            productList.append(field);
            nbProducts++;
        })

    </script>
@endpush

