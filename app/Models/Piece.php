<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'libelle', 'pu', 'type_piece_id', 'note'];
    protected $table = 'pieces';

    public function fourniture()
    {
            return $this->hasMany(Fourniture::class);
    }
}
