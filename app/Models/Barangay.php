<?php

namespace App\Models;

use App\Models\Municipality;
use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    protected $table = 'barangays';

    protected $fillable = [
        'municipalities_id',
        'barangays',
    ];

    public function municipalities()
    {
        return $this->belongsTo(Municipality::class, 'municipalities_id');
    }
}
