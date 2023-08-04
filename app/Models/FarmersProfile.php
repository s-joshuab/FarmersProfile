<?php

namespace App\Models;

use App\Models\Crops;
use App\Models\Regions;
use App\Models\Barangays;
use App\Models\Provinces;
use App\Models\Machineries;
use App\Models\Municipalities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'crops_id',
        'machine_id',
        'gross',
        'parcels',
        'arb'
    ];
    public function regions()
    {
        return $this->belongsTo(Regions::class, 'regions_id');
    }


    public function provinces()
    {
        return $this->belongsTo(Provinces::class, 'provinces_id');
    }


    public function municipalities()
    {
        return $this->belongsTo(Municipalities::class, 'municipalities_id');
    }


    public function barangays()
    {
        return $this->belongsTo(Barangays::class, 'barangays_id');
    }


    public function crops()
    {
        return $this->belongsToMany(Crops::class,'farmersprofile_id', 'crops_id')
            ->withPivot('farm_size', 'farm_location');
    }

    public function machineries()
    {
        return $this->belongsToMany(Machineries::class, 'farmersprofile_id', 'machine_id')
            ->withPivot('units');
    }
}
