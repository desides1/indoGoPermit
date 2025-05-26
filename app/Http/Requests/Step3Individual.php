<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Step3Individual extends FormRequest
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
            'identity_type' => 'required|string|unique|in:KTP,Passport,DriverLicense',
            'number_identity' => 'required|string',
            'name' => 'required|string|max:255',
            'gender' => 'required|string|in:Perempuan, Laki-laki',
            'birthplace' => 'required|string',
            'telephone_hp' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:users,email',
            'job' => 'required|string',
            'npwp_number' => 'required|string',
            'village' => 'required|string',
            'postal_code' => 'required|string|max:10',
            'detail_address' => 'required|string|max:500',
            'date_of_birth' => 'required|date',
            'province_id' => 'required',
            'city_id_city' => 'required',
            'subdistric_id_subdistric' => 'required'
        ];
    }
}
