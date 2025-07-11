<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lit extends Model
{
    protected $fillable = ['nom', 'description', 'salle_id'];

    public function salle(){
        return $this->belongsTo(Salle::class);
    }
}
