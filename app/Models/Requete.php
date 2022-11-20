<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requete extends Model
{
    use HasFactory;
      
    protected $fillable = ['formulaire', 'societe_id', 'requete'];
    protected $table = "requetes";

    public function Societe()
    {
            return $this->belongsTo(Societe::class, 'societe_id');
    }
}
