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

    // public static function createFarmersNumber(array $attributes = [])
    // {
    //     $farmersnumber = DB::table('farmersnumber')
    //         ->where('barangays_id', $attributes['barangays_id'])
    //         ->max('id');

    //     $count = $farmersnumber ? $farmersnumber + 1 : 1;

    //     $attributes['farmersnumber'] = "BLN-{$attributes['barangays_id']}-{$count}";

    //     return parent::create($attributes);
    // }

    public function farmersprofile()
    {
        return $this->belongsTo(FarmersProfile::class, 'farmersprofile_id');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangays::class, 'barangays_id');
    }
}
