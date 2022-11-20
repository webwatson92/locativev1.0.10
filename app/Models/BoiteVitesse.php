<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoiteVitesse extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'libelle'];
    protected $table = 'boite_vitesses';
}
