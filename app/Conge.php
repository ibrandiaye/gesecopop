<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    protected $fillable = [
        'date_debut','date_fin','annee','type_conge_id','employe_id'
    ];

    public function typeConge(){
        return $this->belongsTo(TypeConge::class);
    }
    public function employe(){
        return $this->belongsTo(Employe::class);
    }
}
