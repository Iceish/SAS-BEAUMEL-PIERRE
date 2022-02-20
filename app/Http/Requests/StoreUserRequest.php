<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;

class StoreUserRequest extends FormRequest
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
    #[ArrayShape(['roles' => 'string[]', 'roles.*' => 'array', 'email' => 'array', 'name' => 'string[]'])]
    public function rules(): array
    {
        return [
            'roles' => ['array'],
            'roles.*' => ['required',Rule::in(['true', 'false'])],
            'email' => ['required','email','max:255',Rule::unique('users')],
            'name' => ['required','string','max:255'],
        ];
    }
}
