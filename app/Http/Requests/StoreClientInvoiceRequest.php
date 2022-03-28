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
    #[ArrayShape(['client_id' => 'string[]', 'file' => 'string[]', 'date' => 'string[]'])]
    public function rules(): array
    {
        return [
            'client_id' => ['required','integer',Rule::exists('clients','id')],
            'file' => ['required','file','max:5000'],
            'date' => ['required','date']
        ];
    }
}
