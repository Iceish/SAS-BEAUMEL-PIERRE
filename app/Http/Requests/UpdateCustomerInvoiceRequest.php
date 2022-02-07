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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(["totalTTC" => "float[]", "payment_date" => "string[]","payment_mode" => "string[]"])]
    public function rules(): array
    {
        return [
            "totalTTC" => ["required","string","max:255"],
            "payment_date" => ["required","date"],
            "payment_mode" => ["required","string","max:255"]
        ];
    }
}
