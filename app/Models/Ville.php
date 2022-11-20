<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'libelle', 'pays_id'];
    protected $table = 'villes';

    public function pays()
    {
        return $this->belongsTo(Pays::class);
    }
    
    public function clients()
    {
            return $this->hasMay(Clients::class);
    }
    
    public function fournisseurs()
    {
            return $this->hasMay(Fournisseur::class);
    }

    public function societes()
    {
        return $this->hasMany(Societe::class);
    }

    public function chauffeurs()
    {
            return $this->hasMany(Chauffeur::class);
    }

    public function users()
    {
            return $this->hasMay(User::class);
    }
}
