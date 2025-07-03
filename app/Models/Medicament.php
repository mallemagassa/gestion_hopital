<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    protected $fillable = ['nom', 'description'];

    public function prescriptions()
    {
        return $this->belongsToMany(Prescription::class);
    }
}
