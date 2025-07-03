<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'nom', 'prenom', 'date_de_naissance', 'age', 'sexe', 'adresse',
        'numero_telephone', 'ethnie', 'profession'
    ];

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

    public function rendezVous()
    {
        return $this->hasMany(RendezVous::class);
    }

    public function suivis()
    {
        return $this->hasMany(Suivi::class);
    }
}
