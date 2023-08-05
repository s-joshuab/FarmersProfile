<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    protected $fillable = [
        'commodities_id',
        'farmersprofile_id',
        'farm_size',
        'farm_location',
    ];

    public function farmerProfile()
    {
        return $this->belongsTo(FarmersProfile::class);
    }

    public function commodities()
    {
        return $this->belongsTo(Commodities::class);
    }
}
