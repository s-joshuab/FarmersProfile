<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmersProfile extends Model
{
    use HasFactory;

    protected $table = 'farmers_profile';


        protected $fillable = [
            'farmers_number',
            'reference_control_no',
            'status',
            's_name',
            'f_name',
            'm_name',
            'extension_name',
            'sex',
            'name_of_spouse',
            'mothers_maiden_name',
            'contact_number',
            'date_of_birth',
            'place_of_birth',
            'religion',
            'civil_status',
            'highest_formal_educational',
            'PWD',
            '4Ps_beneficiary',
            'main_livelihood',
            'farm_location',
            'farming_and_nonfarming',
            'parcels',
            'ARB',
            'province_id',
            'municipality_id',
            'barangay_id',

    ];

    // Define the validation rules
    protected $rules = [
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

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id', 'id');
    }

    // Define other relationships (if any) here

}
