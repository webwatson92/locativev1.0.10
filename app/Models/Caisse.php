<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Caisse extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'libelle', 'date', 'periode', 'heure', 'valeur', 'solde', 'type_mouvement_id', 
        'client_id', 'fourniture_id', 'location_id', 'nature_mvm', 'observation', 'societe_id', 'gerant_id', 
        'note', 'url'];
    protected $table = 'caisses';

    public function type_mouvement()
    {
            return $this->belongsTo(TypeMouvement::class);
    }

    public function client()
    {
            return $this->belongsTo(Client::class);
    }

    public function fourniture()
    {
            return $this->belongsTo(Fourniture::class);
    }

    public function location()
    {
            return $this->belongsTo(Location::class);
    }

    public function societe()
    {
            return $this->belongsTo(Societe::class);
    }

    public function gerant()
    {
            return $this->belongsTo(Gerant::class);
    }
}
