<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    use HasFactory;
    protected $fillable = ['code_pays', 'libelle'];
    protected $table = 'pays';

    public function villes()
    {
        return $this->hasMany(ville::class);
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
            return $this->hasMay(Chauffeur::class);
    }

    public function users()
    {
            return $this->hasMay(User::class);
    }
}
