<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePiece extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'libelle'];
    protected $table = 'type_pieces';
}
