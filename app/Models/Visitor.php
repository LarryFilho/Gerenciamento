<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitor_name',
        'visitor_document',
        'visitor_contact',
        'reason',
        'arrival',
        'departure',
    ];

    public function getFormattedDocumentAttribute()
    {
        $document = preg_replace('/\D/', '', $this->visitor_document);

        if (strlen($document) === 11) {
            return substr($document, 0, 3) . '.' . substr($document, 3, 3) . '.' . substr($document, 6, 3) . '-' . substr($document, 9, 2);
        } elseif (strlen($document) === 10) {
            return substr($document, 0, 3) . '.' . substr($document, 3, 3) . '.' . substr($document, 6, 3) . '-' . substr($document, 9, 1);
        }

        return $this->visitor_document;
    }
}
