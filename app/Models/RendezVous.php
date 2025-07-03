<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    protected $fillable = ['heure', 'date', 'validation', 'patient_id'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
