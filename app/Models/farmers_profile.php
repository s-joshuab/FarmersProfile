<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\FarmersProfileRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
            'benefits',
            'main_livelihood',
            'farm_location',
            'farming_and_nonfarming',
            'parcels',
            'ARB',
            'province_id',
            'municipality_id',
            'barangay_id',

    ];

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id', 'id');
    }

    // Define other relationships (if any) here

}
