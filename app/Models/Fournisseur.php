<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    protected $fillable = ['code','libelle','reg_commerce','numero_taxe','numero_tel','adresse','email',
                                'quartier_id','ville_id','pays_id','societe_id','gerant_id','note','url'];
    protected $table = 'fournisseurs';

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

    public function gerant()
    {
            return $this->belongsTo(Gerant::class);
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
