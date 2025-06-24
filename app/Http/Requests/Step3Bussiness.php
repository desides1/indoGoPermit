<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Step3Bussiness extends FormRequest
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

            'name_bussiness' => 'required|string|max:255',
            'business_type' => 'required|string|max:255',
            'registration_number' => 'required|string|max:50|unique:businesses,registration_number',
            'npwp_number' => 'required|string|unique',
            'compan_type' => 'required|string|max:50',
            'total_employee' => 'required|integer',
            'investment_value' => 'required|decimal:0, 20',
            'telephone_hp' => 'required|varchar|max:13',
            'email' => 'nullable|email|max:255',
            'fax' => 'nullable|string|max:20',
            'village' => 'nullable|string',
            'province_id_province' => 'required|integer',
            'city' => 'required|string|max:100',
            'subdistrict_id_subdistrict1' => 'required|string|max:100',
            'detail_address' => 'required|string|max:500',
            'postal_code' => 'required|string|max:20',


        ];
    }
}
