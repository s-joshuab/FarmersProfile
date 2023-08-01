<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FarmingActivityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Implement the authorization logic here based on your application requirements.
        // For example, you can check if the user is authenticated and allowed to make this request.
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
            'farmers_id' => 'required|numeric|exists:farmers_profile,id',
            'commodities_id' => 'required|numeric|exists:commodities,id',
            'farm_size' => 'required|string|max:255',
            'farm_location' => 'nullable|string|max:255',
            // Add more validation rules for other fields as needed.
        ];
    }
}
