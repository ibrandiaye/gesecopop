<?php

namespace App\Repositories;

use App\TypeConge;

class TypeCongeRepository extends RessourceRepository{


    public function __construct(TypeConge $typeConge)
    {
        $this->model = $typeConge;
    }

}
