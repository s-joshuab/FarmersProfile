<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crops extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'crops';

    // Define the fillable attributes
    protected $fillable = ['farm_size', 'farm_location', 'farmersprofile_id', 'commodities_id'];

    // Define the relationship with the FarmersProfile model
    public function farmersProfile()
    {
        return $this->belongsTo(FarmersProfile::class, 'farmersprofile_id');
    }

    // Define the relationship with the Commodity model
    public function commodities()
    {
        return $this->belongsTo(Commodities::class, 'commodities_id');
    }
}
