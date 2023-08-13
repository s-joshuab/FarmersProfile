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
        'parcels',
        'arb',
      //  'crops_id',
        //'machineries_id'
    ];
    public function crops()
    {
        return $this->hasMany(Crops::class, 'farmersprofile_id'); // Use the correct foreign key column name
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
        return $this->belongsTo(Barangays::class, 'barangays_id');
    }


    public function machineries()
    {
        return $this->hasMany(Machineries::class, 'farmersprofile_id');
    }


}
