<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = ['date', 'consultation_id'];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }

    public function medicaments()
    {
        return $this->belongsToMany(Medicament::class);
    }
}
