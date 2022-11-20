<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['code','libelle','statut_reservation'];

    protected $table = 'reservations';

    public function locations()
    {
            return $this->hasMeny(Location::class);
    }
}
