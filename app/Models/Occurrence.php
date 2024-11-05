<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occurrence extends Model
{
    use HasFactory;

    protected $fillable = [
        'occurrence_date',
        'occurrence_time',
        'description',
        'resident_id',
        'resolved',
    ];

    // Define o relacionamento com Resident
    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }
}
