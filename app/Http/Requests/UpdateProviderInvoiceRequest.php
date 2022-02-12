<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UpdateProviderInvoiceRequest extends FormRequest
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
    #[ArrayShape(["provider_id" => "string[]", "path" => "string[]", "date" => "string[]"])]
    public function rules(): array
    {
        return [
            "provider_id" => ["required","integer","exists:providers"],
            "path" => ["required","string","max:255"],
            "date" => ["required","date"]
        ];
    }
}
