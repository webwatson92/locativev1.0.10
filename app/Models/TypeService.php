<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeService extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'libelle'];
    protected $table = 'type_services';

    public function services()
    {
            return $this->hasMany(Service::class);
    }
    
}
