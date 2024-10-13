<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encomenda extends Model
{
    use HasFactory;

    protected $table = 'encomendas';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'apto', 'horario_chegada', 'informacoes_adicionais', 'dia', 'mes'];
}
