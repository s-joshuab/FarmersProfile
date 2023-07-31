<?php

namespace App\Models;

use App\Models\Province;
use Symfony\Component\Mime\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Municipality extends Model
{
    use HasFactory;

    protected $table = 'municipality';

    protected $fillable = [
        'municipality',
        'province_id'
    ];
    public function address()
    {
        return $this->hasMany(Address::class, 'municipality_id', 'id');
    }
    public function province()
    {
        return $this->belongsTo(Province::class, 'municipality_id', 'id');
    }
}
