<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;

class UpdateRoleRequest extends FormRequest
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
            "name" => ["required","max:255"],
            "permissions" => ["array"],
            "permissions.*" => ["required",Rule::in(['true', 'false'])],
        ];
    }
}
