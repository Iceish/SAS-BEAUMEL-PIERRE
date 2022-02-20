<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class ResetPasswordRequest extends FormRequest
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
    #[ArrayShape(['token' => 'array', 'password' => 'array', 'password_confirmation' => 'array'])]
    public function rules(): array
    {
        return [
            'password' => ['required','string','min:8','confirmed','max:255'],
            'password_confirmation' => ['required'],
            'token' => ['required']
        ];
    }
}
