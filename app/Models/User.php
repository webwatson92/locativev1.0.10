<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'prenom', 'email', 'role', 'password', 'numero_tel', 'adresse', 'societe_id', 'quartier_id', 
        'ville_id', 'pays_id', 'note', 'url'
    ];
    protected $table = "users";

    public function chauffeurs()
    {
            return $this->hasMeny(Chauffeur::class);
    }

    public function locations()
    {
            return $this->hasMeny(Location::class);
    }

    public function societe()
    {
            return $this->belongsTo(Societe::class);
    }

    public function quartier()
    { 
            return $this->belongsTo(Quartier::class);
    }

    public function ville()
    {
            return $this->belongsTo(ville::class);
    }

    public function pays()
    {
            return $this->belongsTo(Pays::class);
    }

    public function clients()
    {
            return $this->hasMany(Client::class);
            
        //     ->where("user_id", "=", Auth::user()->id)

    }

    
    public function fournisseurs()
    {
            return $this->hasMany(Fournisseur::class);
    }

    public function entretiens()
    {
            return $this->hasMany(Entretien::class);
    }

    public function services()
    {
            return $this->hasMany(Service::class);
    }

    public function caisses()
    {
            return $this->hasMany(Caisse::class);
    }

    public function vehicules()
    {
            return $this->hasMany(Vehicules::class);
    }

    public function fournitures()
    {
            return $this->hasMany(Fourniture::class);
    }
    
    public function docvehicules()
    {
            return $this->hasMany(DocVehicule::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
