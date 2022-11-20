<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fourniture extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'date', 'periode', 'piece_id', 'type_fourniture_id', 
            'libelle', 'pu', 'qte', 'societe_id',  'gerant_id', 'note', 'url'];
    protected $table = 'fournitures';

    public function type_fourniture()
    {
            return $this->belongsTo(TypeFourniture::class);
    }

    public function caisses()
    {
            return $this->hasMany(Caisse::class);
    }

    public function piece()
    {
            return $this->belongsTo(Piece::class);
    }

    public function societe()
    {
            return $this->belongsTo(Societe::class);
    }

    public function user()
    {
            return $this->belongsTo(User::class);
    }

    public function Caisse()
    {
            return $this->belongsTo(caisse::class);
    }
}
