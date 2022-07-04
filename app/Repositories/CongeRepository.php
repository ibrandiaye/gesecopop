<?php

namespace App\Repositories;

use App\Conge;

class CongeRepository extends RessourceRepository{


    public function __construct(Conge $conge)
    {
        $this->model = $conge;
    }

}
