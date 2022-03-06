<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;

class StoreContactUsRequest extends FormRequest
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
    #[ArrayShape(['subject' => "string[]", 'from' => "string[]", 'content' => "string[]"])]
    public function rules(): array
    {
        return [
            'subject' => ['required','string','max:255'],
            'from' => ['required','string','max:255'],
            'content' => ['required','string','max:255']
        ];
    }
}
