<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['code','libelle','reg_commerce','numero_taxe','numero_tel','adresse','email',
                                'quartier_id','ville_id','pays_id','societe_id','user_id','note','url'];
    protected $table = 'clients';

    public function quartier()
    { 
            return $this->belongsTo(Quartier::class);
    }

    public function caisses()
    {
            return $this->hasMany(Caisse::class);
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

    public function user()
    {
            return $this->belongsTo(User::class);
    }

    public function societe()
    {
            return $this->belongsTo(Societe::class);
    }

    public function cotables()
    {
            return $this->hasMany(Cotable::class);
    }

    
}
