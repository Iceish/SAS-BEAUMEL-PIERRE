<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;

class UpdateMeRequest extends FormRequest
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
    #[ArrayShape([ 'name' => 'string[]', 'postal_code' => 'string[]', 'city' => 'string[]', 'address' => 'string[]','email' => 'string[]'])]
    public function rules(): array
    {
        $user = Auth::user();
        return [
            'email' => ['required','email','max:255',Rule::unique('users')->ignore($user->id)],
            'name' => ['required','string','max:255'],
            'postal_code' => ['required','max:5','min:5'],
            'address' => ['required','max:255'],
            'city' => ['required','max:40']
        ];
    }
}