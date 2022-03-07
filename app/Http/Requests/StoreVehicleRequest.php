<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;

class StoreVehicleRequest extends FormRequest
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
    #[ArrayShape(['name' => "string[]", 'licence_plate' => "string[]", 'revision_date' => "string[]", 'available' => "string[]"])]
    public function rules(): array
    {
        return [
            'name' => ['required','string'],
            'licence_plate' => ['nullable','max:9','min:9',Rule::unique('vehicles','licence_plate')],
            'revision_date' => ['nullable','date'],
            'available' => ['boolean']
        ];
    }
}
