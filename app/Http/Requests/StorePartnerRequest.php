<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;

class StorePartnerRequest extends FormRequest
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
    #[ArrayShape(['name' => "string[]", 'postal_code' => "string[]", 'city' => "string[]", 'address' => "string[]", 'email' => "array", 'tel' => "string[]"])]
    public function rules(): array
    {
        return [
            'name' => ['required','string','max:50'],
            'postal_code' => ['required','max:5','min:5'],
            'city' => ['required','max:40'],
            'address' => ['required','max:255'],
            'email' => ['required','email','max:255', Rule::unique('partners')],
            'tel' => ['required','max:255']
        ];
    }
}
