<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeFourniture extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'libelle'];
    protected $table = 'type_fournitures';

    public function fournitures()
    {
            return $this->hasMany(Fourniture::class);
    }
}
