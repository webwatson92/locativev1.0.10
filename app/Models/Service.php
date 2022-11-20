<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'date', 'periode', 'type_service_id', 
            'libelle', 'pu', 'qte', 'societe_id',  'gerant_id', 'note', 'url'];
    protected $table = 'services';

    public function type_service()
    {
            return $this->belongsTo(TypeService::class);
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


