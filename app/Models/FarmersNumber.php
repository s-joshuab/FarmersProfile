<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class FarmersNumber extends Model
{
    use HasFactory;

    protected $table = 'farmersnumber';

    protected $fillable = [
        'barangays_id',
        'farmersprofile_id',
        'farmersnumber',
    ];

    public function farmersprofile()
    {
    return $this->belongsTo(FarmersProfile::class, 'farmersprofile_id');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangays::class, 'barangays_id');
    }
}
