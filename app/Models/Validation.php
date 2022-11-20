<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validation extends Model
{
    use HasFactory;
    protected $fillable = ['option_tarification'];

    protected $table = 'validations';

    public function locations()
    {
            return $this->hasMeny(Location::class);
    }
}
