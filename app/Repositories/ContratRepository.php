<?php

namespace App\Repositories;

use App\Contrat;
use Illuminate\Support\Facades\DB;

class ContratRepository extends RessourceRepository{


    public function __construct(Contrat $contrat)
    {
        $this->model = $contrat;
    }

    public function getLasContratByEmployeId($id){
        return DB::table('contrats')
        ->where('employe_id',$id)
        ->orderBy('id','desc')
        ->first();
    }

}
