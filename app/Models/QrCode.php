<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    use HasFactory;

    protected $table = 'qrcode';

    protected $fillable = ['farmersprofile_id', 'qrcode'];

    public function farmersProfile()
    {
        return $this->belongsTo(FarmersProfile::class, 'farmersprofile_id');
    }
}
