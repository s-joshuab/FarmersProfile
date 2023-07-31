<?php

namespace App\Models;

use App\Models\Municipality;
use Symfony\Component\Mime\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barangay extends Model
{
    use HasFactory;

    protected $table = 'barangay';

    protected $fillable = [
        'municipality_id',
        'barangay_name'
    ];
    public function address(){
        return $this->hasMany(Address::class, 'barangay_name', 'id');
        }

        public function municipality()
        {
            return $this->belongsTo(Municipality::class, 'municipality_id', 'id');
        }
}
