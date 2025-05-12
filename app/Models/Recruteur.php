<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruteur extends Model
{
    protected $table = 'recruteurs';  // assuming the table name is 'companies'

    // Define fillable fields if necessary
    protected $fillable = ['company_id','Matricule','name', 'description', 'location','industry','website','logo']; 

    // Define the relationship with JobOffer
    public function jobOffers()
    {
        return $this->hasMany(JobOffer::class);
    }
}
