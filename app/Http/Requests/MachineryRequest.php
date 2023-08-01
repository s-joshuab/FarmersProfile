<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MachineryRequest extends FormRequest
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
            'farmers_id' => 'required|numeric|exists:farmers_profile,id',
            'machineries' => 'required|string|max:255',
            'no_of_units' => 'required|integer|min:1',
            // Add any other validation rules for the 'Machinery' model fields
        ];
    }
}
