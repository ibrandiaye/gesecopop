<?php

namespace App\Repositories;

use App\Conge;
use App\Employe;
use Illuminate\Support\Facades\DB;

class CongeRepository extends RessourceRepository{


    public function __construct(Conge $conge)
    {
        $this->model = $conge;
    }
    public function getCongeByEmployeeByAnnee($id,$annee,$type_conge_id){
        return Conge::where([['employe_id',$id],['annee',$annee],['type_conge_id',$type_conge_id]])
        ->get();
    }

}
