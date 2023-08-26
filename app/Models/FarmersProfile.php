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
        'regions',
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
        'grosses',
        'parcels',
        'arb',
      //  'crops_id',
        //'machineries_id'
    ];
    public function crops()
    {
        return $this->hasMany(Crops::class, 'farmersprofile_id');
    }

    public function province()
    {
        return $this->belongsTo(Provinces::class, 'provinces_id');
    }

    public function municipality()
    {
        return $this->belongsTo(Municipalities::class, 'municipalities_id');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangays::class, 'barangays_id');
    }


    public function machineries()
    {
        return $this->hasMany(Machineries::class, 'farmersprofile_id');
    }

    public function commodities()
    {
        return $this->belongsToMany(Commodities::class);
    }

    public function farmersNumbers()
    {
        return $this->hasMany(FarmersNumber::class, 'farmersprofile_id');
    }

    public function qrCode()
    {
        return $this->hasOne(QrCode::class, 'farmersprofile_id');
    }

}
