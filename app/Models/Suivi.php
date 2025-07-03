<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suivi extends Model
{
    protected $fillable = ['intitule', 'date', 'description', 'patient_id', 'infirmier_id'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function infirmier()
    {
        return $this->belongsTo(Infirmier::class);
    }
}
