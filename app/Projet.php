<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [
        'nomp'
    ];
    public function employes(){
        return $this->hasMany(Employe::class);
    }
}
