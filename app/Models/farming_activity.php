<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\FarmingActivityRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FarmingActivity extends Model
{
    use HasFactory;

    // Create a new farming activity entry
    // FarmingActivity::create([
    //     'farmers_id' => 1,
    //     'commodities_id' => 2,
    //     'farm_size' => '10 acres',
    //     'farm_location' => 'Farmville',
    // ]);

    // // Access the farmer profile related to a farming activity entry
    // $farmingActivity = FarmingActivity::find(1);
    // $farmerProfile = $farmingActivity->farmerProfile; // This will retrieve the related FarmersProfile instance

    // // Access the commodity related to a farming activity entry
    // $commodity = $farmingActivity->commodity; // This will retrieve the related Commodity instance


    protected $table = 'farming_activity';

    protected $fillable = [
        'farmers_id',
        'commodities_id',
        'farm_size',
        'farm_location',
    ];

    public function farmerProfile()
    {
        return $this->belongsTo(FarmersProfile::class, 'farmers_id', 'id');
    }

    public function commodity()
    {
        return $this->belongsTo(Commodity::class, 'commodities_id', 'id');
    }

}
