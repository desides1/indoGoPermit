<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Step1Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'request_type' => 'required|string',
            'permit_type' => 'required|string',
            'request_number' => 'required|string'
        ];
    }
}
