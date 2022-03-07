<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
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
    #[ArrayShape(['licence_plate' => 'char[]', 'revision_date' => 'date', 'available' => 'boolean'])]
    public function rules(): array
    {
        return [
            'licence_plate' => ['required','max:9','min:9'],
            'revision_date' => ['required','date'],
            'available' => ['boolean']
        ];
    }
}
