<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;

class UpdateUserRequest extends FormRequest
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
    #[ArrayShape(['roles' => "string[]", 'roles.*' => "array", 'email' => "array", 'name' => "string[]", 'address' => "string[]", 'postal_code' => "string[]", 'city' => "string[]", 'tel' => "string[]"])]
    public function rules(): array
    {
        $user = $this->route('user');
        return [
            'roles' => ['array'],
            'roles.*' => ['required',Rule::in(['true', 'false'])],
            'email' => ['required','email','max:255',Rule::unique('users')->ignore($user->id)],
            'name' => ['required','string','max:255'],
            'address' => ['nullable','string','max:255'],
            'postal_code' => ['nullable','string','max:5'],
            'city' => ['nullable','string','max:255'],
            'tel' => ['nullable','max:255']
        ];
    }
}
