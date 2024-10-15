<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',   
        'user_id',
        'operation_type',
        'quantity',
        'description',
        'operation_date_time',
    ];

 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
