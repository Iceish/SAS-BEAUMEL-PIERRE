<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UpdateClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(["email" => "string[]", "name" => "string[]", "postal_code" => "char[]","address" => "string[]","city" =>"string[]"])]
    public function rules(): array
    {
        return [
            "email" => ["required","email","max:255"],
            "name" => ["required","string","max:50"],
            "postal_code" => ["required","max:5","min:5"],
            "address" => ["required","max:255","min:30"],
            "city" => ["required","max:40","min:1"]

        ];
    }
}
