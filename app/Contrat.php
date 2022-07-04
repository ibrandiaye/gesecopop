<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    protected $fillable = [
        'datedebut','datefin','type','employe_id','poste'
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
