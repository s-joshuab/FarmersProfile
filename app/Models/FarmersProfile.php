<?php

namespace App\Models;

use App\Models\Crop;
use App\Models\Region;
use App\Models\Province;
use App\Models\Machinery;
use App\Models\Municipality;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class FarmersProfile extends Model
{
    use HasFactory;

    protected $table = 'farmersprofile';

    protected $fillable = [
        'farm_number',
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
        'crops_id',
        'machinery_id',
        'gross',
        'parcels',
        'arb',
    ];

    // Define the relationship with the 'regions' table (belongs to one region).
    public function regions()
    {
        return $this->belongsTo(Region::class, 'regions_id');
    }

    // Define the relationship with the 'provinces' table (belongs to one province).
    public function provinces()
    {
        return $this->belongsTo(Province::class, 'provinces_id');
    }

    // Define the relationship with the 'municipalities' table (belongs to one municipality).
    public function municipalities()
    {
        return $this->belongsTo(Municipality::class, 'municipalities_id');
    }

    // Define the relationship with the 'barangays' table (belongs to one barangay).
    public function barangays()
    {
        return $this->belongsTo(Barangay::class, 'barangays_id');
    }

    // Define the relationship with the 'crops' table (belongs to one crop).
    public function crops()
    {
        return $this->belongsTo(Crop::class, 'crops_id');
    }

    // Define the relationship with the 'machineries' table (belongs to one machinery).
    public function machineries()
    {
        return $this->belongsTo(Machinery::class, 'machinery_id');
    }
}
