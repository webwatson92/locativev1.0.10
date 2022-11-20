<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerant extends Model
{
    protected $fillable = ['code','nom','prenom','email','password','adresse','societe_id',
                                'quartier_id','ville_id','pays_id','note',"url"];
    protected $table = 'gerants';

    

    public function chauffeurs()
    {
            return $this->hasMeny(Chauffeur::class);
    }

    public function locations()
    {
            return $this->hasMeny(Location::class);
    }

    public function societe()
    {
            return $this->belongsTo(Societe::class);
    }

    public function quartier()
    { 
            return $this->belongsTo(Quartier::class);
    }

    public function ville()
    {
            return $this->belongsTo(ville::class);
    }

    public function pays()
    {
            return $this->belongsTo(Pays::class);
    }

    public function clients()
    {
            return $this->hasMany(Client::class);
    }

    
    public function fournisseurs()
    {
            return $this->hasMany(Fournisseur::class);
    }

    public function entretiens()
    {
            return $this->hasMany(Entretien::class);
    }

    public function services()
    {
            return $this->hasMany(Service::class);
    }

    public function caisses()
    {
            return $this->hasMany(Caisse::class);
    }

}
