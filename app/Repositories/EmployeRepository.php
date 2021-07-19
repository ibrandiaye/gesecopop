<?php

namespace App\Repositories;

use App\Employe;
use Illuminate\Support\Facades\DB;

class EmployeRepository extends RessourceRepository{


    public function __construct(Employe $employe)
    {
        $this->model = $employe;
    }
    public function getEmployeWithRelation(){
        return Employe::with(['projet','contrats'])
        ->get();
    }
    public function nbStage(){
        return DB::table('employes')
        ->where('statut','Stage')
        ->count();
    }
    public function nbCdd(){
        return DB::table('employes')
        ->where('statut','CDD')
        ->count();
    }
    public function nbCdi(){
        return DB::table('employes')
        ->where('statut','CDI')
        ->count();
    }

}
