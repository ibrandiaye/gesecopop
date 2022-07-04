<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeConge extends Model
{

    protected $fillable = [
        'type','nbj'
    ];

    public function conges(){
        return $this->hasMany(Conge::class);
    }
}
