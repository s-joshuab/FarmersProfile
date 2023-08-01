<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Requests\FarmingActivityCommodiiesRequest;

class Commodiies extends Model
{
    use HasFactory;

    protected $table = 'commodities';

    // Remove the $fillable property
    // protected $fillable = ['commodities'];

    public static function validationRules(FarmingActivityCommodiiesRequest $request)
    {
        return $request->validated();
    }

    public function farmingActivities()
    {
        return $this->belongsToMany(FarmingActivity::class, 'commodiies_farming_activity', 'commodiies_id', 'farming_activity_id');
    }
}
