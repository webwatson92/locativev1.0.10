<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = ['code','client_id','vehicule_id','chauffeur_id','date_debut','date_fin',
            'pu_journalier','prix_total', 'va_payer', 'va_rester_a_payer', 'tarification_id', 
            'option_tarification','validation_id', 'societe_id', 'reservation_id',
            'statut_reservation', 'gerant_id','note',"url"];
    protected $table = 'locations';

    public function client()
    {
            return $this->belongsTo(Client::class);
    }
    public function caisses()
    {
            return $this->hasMany(Caisse::class);
    }
    public function vehicule()
    {
            return $this->belongsTo(Vehicule::class);
    }
    public function chauffeur()
    {
            return $this->belongsTo(Chauffeur::class);
    }
    public function tarification()
    {
            return $this->belongsTo(Tarification::class);
    }
    public function validation()
    {
            return $this->belongsTo(Validation::class);
    }
    public function societe()
    {
            return $this->belongsTo(Societe::class);
    }
    public function reservation()
    {
            return $this->belongsTo(Reservation::class);
    }
    public function gerant()
    {
            return $this->belongsTo(Gerant::class);
    }
}
