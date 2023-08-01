<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FarmingActivityCommodiiesRequest extends FormRequest
{
    public function authorize()
    {
        // Implement the authorization logic here based on your application requirements.
        // For example, you can check if the user is authenticated and allowed to make this request.
        return true;
    }

    public function rules()
    {
        return [
            // Validation for the 'commodities' field as an array of existing 'commodities' IDs
            'commodities' => 'required|array',
            'commodities.*' => 'exists:commodities,id',
        ];
    }
}
