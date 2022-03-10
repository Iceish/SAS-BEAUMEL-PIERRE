<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UpdateCameraRequest extends FormRequest
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
    #[ArrayShape(["name" => "string[]", "ip" => "string[]", "username" => "string[]", "password" => "string[]", "place" => "string[]"])]
    public function rules(): array
    {
        return [
            "name" => ["required","string","max:255"],
            "ip" => ["required","ip"],
            "username" => ["required","string","max:255"],
            "password" => ["required","string","max:255"],
            "place" => ["required","string","max:255"],
        ];
    }
}
