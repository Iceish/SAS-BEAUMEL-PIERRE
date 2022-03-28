<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UpdateClientInvoiceRequest extends FormRequest
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
    #[ArrayShape(['client_id' => 'string[]', 'path' => 'string[]', 'date' => 'string[]'])]
    public function rules(): array
    {
        return [
            'client_id' => ['required','integer','exists:client'],
            'path' => ['required','string','max:255'],
            'date' => ['required','date']
        ];
    }
}
