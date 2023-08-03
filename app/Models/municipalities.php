<?php

namespace App\Models;

use App\Models\Barangay;
use App\Models\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Municipality extends Model
{
    use HasFactory;

    protected $table = 'municipalities';

    protected $fillable = [
        'provinces_id',
        'municipalities',
    ];

    public function provinces()
    {
        return $this->belongsTo(Province::class, 'provinces_id');
    }

    public function barangays()
    {
        return $this->hasMany(Barangay::class, 'municipalities_id');
    }
}
