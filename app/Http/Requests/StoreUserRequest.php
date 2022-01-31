<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
<<<<<<< HEAD
=======
use JetBrains\PhpStorm\ArrayShape;
>>>>>>> origin/master

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
<<<<<<< HEAD
    public function authorize()
    {
        return false;
=======
    public function authorize(): bool
    {
        return true;
>>>>>>> origin/master
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
<<<<<<< HEAD
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255'
=======
    #[ArrayShape(["email" => "string[]", "name" => "string[]"])]
    public function rules(): array
    {
        return [
            "email" => ["required","email","max:255"],
            "name" => ["required","string","max:255"],
>>>>>>> origin/master
        ];
    }
}
