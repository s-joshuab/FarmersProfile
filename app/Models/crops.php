<?php

namespace App\Models;

use App\Models\Commodity;
use App\Models\FarmersProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Crop extends Model
{
    use HasFactory;

    protected $table = 'crops';

    protected $fillable = [
        'farmersprofile_id',
        'commodities_id',
        'farm_size',
        'farm_location',
    ];

    public function farmersProfile()
    {
        return $this->belongsTo(FarmersProfile::class, 'farmersprofile_id');
    }

    public function commodities()
    {
        return $this->belongsTo(Commodity::class, 'commodities_id');
    }
}
