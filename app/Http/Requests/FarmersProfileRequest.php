<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FarmersProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // By default, it's set to false.
        // You can update the authorization logic based on your application requirements.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'farmers_number' => 'required|string|max:255',
            'reference_control_no' => 'nullable|string|max:255',
            'status' => 'required|string|max:255',
            's_name' => 'required|string|max:255',
            'f_name' => 'required|string|max:255',
            'm_name' => 'nullable|string|max:255',
            'extension_name' => 'nullable|string|max:255',
            'sex' => 'required|string|max:255',
            'name_of_spouse' => 'nullable|string|max:255',
            'mothers_maiden_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required|string|max:255',
            'religion' => 'nullable|string|max:255',
            'civil_status' => 'required|string|max:255',
            'highest_formal_educational' => 'nullable|string|max:255',
            'PWD' => 'required|boolean',
            '4Ps_beneficiary' => 'required|boolean',
            'main_livelihood' => 'nullable|string|max:255',
            'farm_location' => 'nullable|string|max:255',
            'farming_and_nonfarming' => 'nullable|string|max:255',
            'parcels' => 'nullable|string|max:255',
            'ARB' => 'required|boolean',
            'province_id' => 'required|numeric|exists:provinces,id',
            'municipality_id' => 'required|numeric|exists:municipalities,id',
            'barangay_id' => 'required|numeric|exists:barangays,id',
        ];
    }
}
