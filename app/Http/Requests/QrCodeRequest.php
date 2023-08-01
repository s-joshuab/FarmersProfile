<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QrCodeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'farmers_id' => 'required|numeric|exists:farmers_profile,id',
            'qr_image' => 'required|image|mimes:png,jpg,jpeg|max:2048', // Assuming you're accepting PNG, JPG, JPEG formats with a max size of 2MB (2048 KB)
        ];
    }
}
