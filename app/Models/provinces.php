<?php

namespace App\Models;

use App\Models\Region;
use App\Models\Municipality;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Province extends Model
{
    use HasFactory;

    protected $table = 'provinces';

    protected $fillable = [
        'regions_id',
        'provinces',
    ];

    public function regions()
    {
        return $this->belongsTo(Region::class, 'regions_id');
    }

    public function municipalities()
    {
        return $this->hasMany(Municipality::class, 'provinces_id');
    }
}
