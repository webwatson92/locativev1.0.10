<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotable extends Model
{
    use HasFactory;
    
    protected $fillable = ['cotable_id', 'formulaire', 'societe_id', 'codification', 'option_codification', 'numero'];
    protected $table = "cotables";

    public function client()
    {
            return $this->belongsTo(Client::class, 'client_id');
    }

    public function Societe()
    {
            return $this->belongsTo(Societe::class, 'societe_id');
    }

}
