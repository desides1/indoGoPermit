<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Step5Proyek extends FormRequest
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
            'project_type' => 'required|string',
            'investment_value' => 'required|decimal:0, 20',
            'target_pad' => 'required|decimal:0,20',
            'total_employee' => 'required|integer',
        ];
    }
}
