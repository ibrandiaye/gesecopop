<?php

namespace App\Repositories;

use App\Projet;

class ProjetRepository extends RessourceRepository{


    public function __construct(Projet $projet)
    {
        $this->model = $projet;
    }

}
