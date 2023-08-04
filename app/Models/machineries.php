<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machineries extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'machineries';

    // Define the fillable attributes
    protected $fillable = ['farmersprofile_id', 'machine_id', 'units'];

    // Define the relationship with the FarmersProfile model
    public function farmersProfile()
    {
        return $this->belongsTo(FarmersProfile::class, 'farmersprofile_id');
    }

    // Define the relationship with the Machine model
    public function machine()
    {
        return $this->belongsTo(Machine::class, 'machine_id');
    }
}
