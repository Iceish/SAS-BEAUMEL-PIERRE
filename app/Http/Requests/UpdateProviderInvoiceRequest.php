<?php

namespace App\Http\Requests;

use JetBrains\PhpStorm\ArrayShape;

class UpdateProviderInvoiceRequest
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
    #[ArrayShape(["path" => "string[]", "date" => "string[]"])]
    public function rules(): array
    {
        return [
            "path" => ["required","path","max:255"],
            "date" => ["required","date"]
        ];
    }
}
