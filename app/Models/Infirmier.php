<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Infirmier extends Model
{
    protected $fillable = ['nom', 'prenom', 'numero_telephone', 'adresse'];

    public function suivis()
    {
        return $this->hasMany(Suivi::class);
    }
}
