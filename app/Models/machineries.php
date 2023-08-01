<?php

namespace App\Models;

use App\Http\Requests\MachineryRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Machinery extends Model
{
    use HasFactory;

    // Create a new machinery entry
    // Machinery::create([
    //     'farmers_id' => 1,
    //     'machineries' => 'Tractor',
    //     'no_of_units' => 2,
    // ]);

    // // Access the farmer profile related to a machinery entry
    // $machinery = Machinery::find(1);
    // $farmerProfile = $machinery->farmerProfile; // This will retrieve the related FarmersProfile instance


    protected $table = 'machineries';

    protected $fillable = [
        'farmers_id',
        'machineries',
        'no_of_units',
    ];

    public function farmerProfile()
    {
        return $this->belongsTo(FarmersProfile::class, 'farmers_id', 'id');
    }

    public static function validationRules(MachineryRequest $request)
    {
        return $request->validated();
    }
}
