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
    #[ArrayShape(["roles" => "string[]", "roles.*" => "array", "email" => "string[]", "name" => "string[]"])]
    public function rules(): array
    {
        $user = $this->route('user');
        return [
            "roles" => ["array"],
            "roles.*" => ["required",Rule::in(['true', 'false'])],
            "email" => ["required","email","max:255",Rule::unique('users')->ignore($user->id)],
            "name" => ["required","string","max:255"],
        ];
    }
}
