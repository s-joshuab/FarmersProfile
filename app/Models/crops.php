<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;

    protected $fillable = [
        'commodities_id',
        'farmersprofile_id',
        'farm_size',
        'farm_location',
    ];

    public function farmersProfile()
    {
        return $this->belongsTo(FarmersProfile::class, 'farmersprofile_id');
    }

    public function commodity()
    {
        return $this->belongsTo(Commodities::class, 'commodities_id');
    }
}
