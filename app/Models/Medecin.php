<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    // protected $primaryKey = 'matricule';
    // public $incrementing = false;
    // protected $keyType = 'string';

    protected $fillable = [
        'matricule', 'nom', 'prenom', 'date_de_naissance', 'adresse', 'telephone', 'specialite'
    ];

    public function consultations()
    {
        return $this->hasMany(Consultation::class, 'medecin_matricule', 'matricule');
    }
}
