<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatPermis extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'libelle'];
    protected $table = 'cat_permis';

    public function chauffeurs()
    {
            return $this->belongsTo(Chauffeur::class);
    }
}
