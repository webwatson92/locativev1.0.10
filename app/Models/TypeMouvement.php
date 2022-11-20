<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMouvement extends Model
{
    use HasFactory;
    protected $fillable = ['code','libelle','nature_mvm'];
    protected $table = 'type_mouvements';

    public function caisses()
    {
            return $this->hasMany(Caisse::class);
    }
}
