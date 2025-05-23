<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    use HasFactory;
    protected $table = 'offres';
    protected $fillable =
    ['company_id',
    'title',
    'description',
    'requirements',
    'location',
    'contract_type',
    'date_posted',
    'status',
    'type',
    'duree'];

    public function recruteur()
    {
        return $this->belongsTo(Recruteur::class);
    }
}
