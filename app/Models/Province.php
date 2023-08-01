<?php

namespace App\Models;

use App\Models\Municipality;
use Symfony\Component\Mime\Address;
use App\Http\Requests\ProvinceRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Province extends Model
{
    use HasFactory;

    protected $table = 'province';

    protected $fillable = [
        'province'
    ];

    public function address()
    {
        return $this->hasMany(Address::class, 'barangay_id', 'id');
    }
    public function municipalities()
    {
        return $this->hasMany(Municipality::class, 'province_id', 'id');
    }
}
