<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;

class StoreProductRequest extends FormRequest
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
    #[ArrayShape(['name' => "array", 'quantity' => "string[]", 'file' => "string[]", 'price' => "string[]"])]
    public function rules(): array
    {
        return [
            'name' => ['required','string',Rule::unique('products')],
            'quantity' => ['required','integer'],
            'file' => ['image','size:10000'],
            'price' => ['digits:6']
        ];
    }
}
