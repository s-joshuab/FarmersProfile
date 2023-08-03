<?php

namespace App\Models;

use App\Models\regions;
use App\Models\Provinces;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory;

    protected $table = 'regions';

    protected $fillable = [
        'regions',
    ];

    public function provinces()
    {
        return $this->hasMany(provinces::class, 'regions_id');
    }
}
