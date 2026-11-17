<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DrinkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "drink" => [ "required", "string", "min:3", "max:30" ],
            "amount" => [ "required", "numeric", "min:0" ],
            "price" => [ "required", "numeric", "min:0" ],
            "type" => [ "required", "string", "min:3", "max:20" ],
            "package" => [ "required", "string", "min:3", "max:20" ],
        ];
    }
}
