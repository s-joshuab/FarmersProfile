<?php

namespace App\Models;

use App\Http\Requests\QrCodeRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QrCode extends Model
{
    use HasFactory;


    protected $table = 'qr_code';

    protected $fillable = [
        'farmers_id',
        'qr_image',
    ];

    public function farmerProfile()
    {
        return $this->belongsTo(FarmersProfile::class, 'farmers_id', 'id');
    }

}
