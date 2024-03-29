<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;

class StoreCkeditor1Request extends FormRequest
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
    #[ArrayShape(["htmls" => "string[]", "htmls.*" => "string[]", "id" => "string[]", "name" => "string[]"])]
    public function rules(): array
    {
        return [
            "htmls" => ['required','array'],
            "htmls.*" => ['required'],
            "id" => ['required','integer'],
            "name" => ['required','string']
        ];
    }
}
