<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreRoleRequest extends FormRequest
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
    #[ArrayShape(["role_name" => "string[]", "permissions" => "string[]"])]
    public function rules(): array
    {
        return [
            "role_name" => ["required","max:255"],
            "permissions" => ["required"]
        ];
    }
}
