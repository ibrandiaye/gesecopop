<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $fillable = [
        'nom','prenom','telephone','sexe','datenaiss','dateentre','findecontrat',
        'sm','nbenfant','statut','etude','adresse','lien','projet_id','photo'
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
    public function contrats(){
        return $this->hasMany(Contrat::class);
    }
    public function conges(){
        return $this->hasMany(Conge::class);
    }
}
