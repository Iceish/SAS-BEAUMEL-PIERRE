<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;

class StoreClientRequest extends FormRequest
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
    #[ArrayShape(['email' => "array", 'name' => "string[]", 'postal_code' => "string[]", 'address' => "string[]", 'city' => "string[]", 'tel' => "string[]"])]
    public function rules(): array
    {
        return [
            'email' => ['required','email','max:255',Rule::unique('clients')],
            'name' => ['required','string','max:50'],
            'postal_code' => ['required','max:5','min:5'],
            'address' => ['required','max:255'],
            'city' => ['required','max:40'],
            'tel' => ['required','max:255']
        ];
    }
}
