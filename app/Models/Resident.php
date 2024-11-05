<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Resident extends Model
{
    use HasFactory;

    protected $table = 'residents';

    protected $fillable = [
        'resident_name',
        'resident_document',
        'apto',
        'resident_contact',
        'address',
        'move_in_date',
        'move_out_date',
    ];

    protected $dates = [
        'move_in_date',
        'move_out_date',
    ];

    public function getFormattedDocumentAttribute()
    {
        $document = preg_replace('/\D/', '', $this->resident_document);

        if (strlen($document) === 11) {
            return substr($document, 0, 3) . '.' . substr($document, 3, 3) . '.' . substr($document, 6, 3) . '-' . substr($document, 9, 2);
        } elseif (strlen($document) === 10) {
            return substr($document, 0, 3) . '.' . substr($document, 3, 3) . '.' . substr($document, 6, 3) . '-' . substr($document, 9, 1);
        }

        return preg_replace('/^(\d{3})(\d{3})(\d{3})$/', '$1.$2.$3', $this->resident_document);
    }
    public function user()
    {
        return $this->hasOne(User::class, 'email', 'resident_name');
    }
    
    public function encomendas()
{
    return $this->hasMany(Encomenda::class);
}

} 