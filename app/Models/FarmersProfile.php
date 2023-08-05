<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmersProfile extends Model
{
    use HasFactory;

    protected $table = 'farmersprofile';

    protected $fillable = [
        'ref_no',
        'status',
        'sname',
        'fname',
        'mname',
        'ename',
        'sex',
        'spouse',
        'mother',
        'number',
        'regions_id',
        'provinces_id',
        'municipalities_id',
        'barangays_id',
        'purok',
        'house',
        'dob',
        'pob',
        'religion',
        'cstatus',
        'education',
        'pwd',
        'benefits',
        'livelihood',
        'gross',
        'parcels',
        'arb',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class, 'regions_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'provinces_id');
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipalities_id');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangays_id');
    }
}
