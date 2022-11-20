<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarification extends Model
{
    use HasFactory;
    protected $fillable = ['code','libelle', 'valeur', 'option_tarification'];

    protected $table = 'tarifications';

    public function locations()
    {
            return $this->hasMeny(Location::class);
    }
}
