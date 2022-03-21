<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;

class StoreClientInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'client_id' => ['required','integer',Rule::exists('clients','id')],
            'totalTTC' => ['required','numeric'],
            'payment_date' => ['required','date'],
            'payment_mode' => ['required','string','max:255'],
            'products' => ['array'],
            'products.*' => ['required','array'],
            'products.*.transport' => ['string'],
            'products.*.vat' => ['required','numeric'],
            'products.*.quantity' => ['required','integer'],
        ];
    }
}
