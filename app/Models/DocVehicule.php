<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocVehicule extends Model
{
    use HasFactory;
    protected $fillable = [
        'code', 'libelle', 'date_etablissement', 'date_validation', 'valeur',
        'date_fin', 'societe_id', 'vehicule_id', 'user_id', 'note', "url"
    ];
    protected $table = 'doc_vehicules';

    public function user()
    {
            return $this->belongsTo(User::class);
    }

    public function societe()
    {
            return $this->belongsTo(Societe::class);
    }

    public function vehicule()
    {
            return $this->belongsTo(Vehicule::class);
    }
    
}
