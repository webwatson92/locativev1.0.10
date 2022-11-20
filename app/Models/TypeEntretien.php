<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeEntretien extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'libelle'];
    protected $table = 'type_entretiens';

    public function entretiens()
    {
            return $this->hasMany(Entretien::class);
    }
}
