<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AuditTrail extends Model
{
    use HasFactory;

    protected $table = 'audit_trails'; // Set the correct table name
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'causer_id');
    }
}
