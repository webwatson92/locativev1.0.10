<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;
    protected $fillable = [
        'code', 'libelle', 'date_acquisition', 'date_cession', 'valeur',
        'puissance', 'type_vehicule_id', 'type_energie_id', 'boite_vitesse_id',
        'societe_id', 'user_id', "kmc", "dkmc", "pvd", "dkmc2"
    ];
    protected $table = 'vehicules';

    public function type_energie()
    {
            return $this->belongsTo(TypeEnergy::class);
    }

    public function type_vehicule()
    {
            return $this->belongsTo(TypeVehicule::class);
    }
    public function locations()
    {
            return $this->hasMeny(Location::class);
    }

    public function docvehicules()
    {
            return $this->hasMany(DocVehicule::class);
    }
    
    public function boite_vitesse()
    {
            return $this->belongsTo(BoiteVitesse::class);
    }

    public function user()
    {
            return $this->belongsTo(User::class);
    }

    public function societe()
    {
            return $this->belongsTo(Societe::class);
    }
    
    public function entretiens()
    {
            return $this->hasMany(Entretien::class);
    }

}
