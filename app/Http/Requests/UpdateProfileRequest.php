<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;

class UpdateProfileRequest extends FormRequest
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
    #[ArrayShape(['email' => 'string[]', 'password' => 'string[]', 'name' => 'string[]', 'address' => 'string[]', 'postal_code' => 'string[]', 'city' => 'string[]'])]
    public function rules(): array
    {

        return [

            'email' => ['required','email','max:255'],
            'name' => ['required','string','max:255'],
            'address' => ['nullable','string','max:255'],
            'postal_code' => ['nullable','string','max:5'],
            'city' => ['nullable','string','max:255'],
            'password' => ['string','max:255'],
        ];
    }
}
