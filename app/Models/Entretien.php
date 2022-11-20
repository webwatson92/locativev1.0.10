<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entretien extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'date_acquisition', 'date_cession', 'type_entretien_id', 
            'libelle', 'kilometrage', 'kilometrage_p_v', 'service_id', 'valeur_service', 'valeur_fourniture',
            'valeur_total', 'fourniture_id', 'vehicule_id', 'societe_id', 'gerant_id', 'note', 'url'];
    protected $table = 'entretiens';

    public function type_entretien()
    {
            return $this->belongsTo(TypeEntretien::class);
    }

    public function service()
    {
            return $this->belongsTo(Service::class);
    } 

    public function fourniture()
    {
            return $this->belongsTo(Fourniture::class);
    }

    public function vehicule()
    {
            return $this->belongsTo(Vehicule::class);
    }

    public function societe()
    {
            return $this->belongsTo(Societe::class);
    }

    public function gerant()
    {
            return $this->belongsTo(gerant::class);
    }

}
