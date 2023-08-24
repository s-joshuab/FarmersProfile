<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    use HasFactory;

    protected $table = 'qr_codes';

    protected $fillable = [
        'farmersnumber',
        'qr_data',
    ];

    protected $casts = [
        'qr_data' => 'json', // Cast qr_data column to JSON format
    ];
}

