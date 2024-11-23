<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comum extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_id',
        'resident_id',
        'resident_apto',
        'informacoes_adicionais',
        'data',
        'user_id',
    ];

        public function resident()
    {
        return $this->belongsTo(Resident::class);
        
    }

    public function apto()
    {
        return $this->belongsTo(Apto::class);
        
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
        
    }

    public function user()
    {
        return $this->belongsTo(User::class);
        
    }
}
