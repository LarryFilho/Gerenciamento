<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encomenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'horario_chegada',
        'informacoes_adicionais',
        'dia',
        'mes',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
