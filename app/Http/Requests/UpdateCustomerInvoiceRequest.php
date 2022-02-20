<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UpdateCustomerInvoiceRequest extends FormRequest
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
    #[ArrayShape(['client_id' => 'string[]', 'totalTTC' => 'string[]', 'payment_date' => 'string[]', 'payment_mode' => 'string[]'])]
    public function rules(): array
    {
        return [
            'client_id' => ['required','integer','exists:clients'],
            'totalTTC' => ['required','string','max:255'],
            'payment_date' => ['required','date'],
            'payment_mode' => ['required','string','max:255']
        ];
    }
}
