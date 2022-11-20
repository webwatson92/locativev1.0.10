<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    use HasFactory;
    protected $fillable = ['code','nom','prenom','email','numero_tel','adresse','sexe',
                                'date_expiration_permis','quartier_id','ville_id','pays_id',
                                'gerant_id','note',"url"];
    protected $table = 'chauffeurs';

    public function quartier()
    { 
            return $this->belongsTo(Quartier::class);
    }
    public function locations()
    {
            return $this->hasMeny(Location::class);
    }
    public function ville()
    {
            return $this->belongsTo(ville::class);
    }

    public function pays()
    {
            return $this->belongsTo(Pays::class);
    }

    public function gerant()
    {
            return $this->belongsTo(Pays::class);
    }

    public function cat_permis()
    {
            return $this->belongsTo(CatPermis::class);
    }
}
