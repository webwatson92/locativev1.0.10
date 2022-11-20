<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    use HasFactory;
    protected $fillable = ['code','libelle','reg_commerce','numero_taxe','numero_tel','adresse','email',
                                'quartier_id','ville_id','pays_id','note','url'];
    protected $table = 'societes';

    public function quartier()
    { 
            return $this->belongsTo(Quartier::class);
    }

    public function docvehicules()
    {
            return $this->hasMany(DocVehicule::class);
    }
    
    public function ville()
    {
            return $this->belongsTo(ville::class);
    }

    public function pays()
    {
            return $this->belongsTo(Pays::class);
    }

    public function users()
    {
            return $this->hasMany(User::class);
    }

    public function clients()
    {
            return $this->hasMany(Client::class);
    }
    
    public function fournisseurs()
    {
            return $this->hasMay(Fournisseur::class);
    }

    public function entretiens()
    {
            return $this->hasMany(Entretien::class);
    }

    public function services()
    {
            return $this->hasMany(Service::class);
    }

    public function locations()
    {
            return $this->hasMeny(Location::class);
    }
    public function caisses()
    {
            return $this->hasMany(Caisse::class);
    }

    public function cotables()
    {
            return $this->hasMany(Cotable::class);
    }

    public function requetes()
    {
            return $this->hasMany(Requete::class);
    }
}
