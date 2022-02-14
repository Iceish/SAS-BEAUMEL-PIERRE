<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
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
    #[ArrayShape(["roles_id" => "string[]", "email" => "string[]", "name" => "string[]", "password" => "string[]"])]
    public function rules(): array
    {
        return [
            "roles_id.*" => ["array"],
            "email" => ["required","email","max:255"],
            "name" => ["required","string","max:255"],
            "password" => ["max:255","min:8"],
        ];
    }
}
