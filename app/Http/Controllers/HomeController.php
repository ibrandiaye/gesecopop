<?php

namespace App\Http\Controllers;

use App\Repositories\ContratRepository;
use App\Repositories\EmployeRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $employeRepository;
    protected $contratRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EmployeRepository $employeRepository, ContratRepository $contratRepository)
    {
        $this->middleware('auth');
        $this->employeRepository = $employeRepository;
        $this->contratRepository = $contratRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $nbStage = $this->employeRepository->nbStage();
        $nbCdd = $this->employeRepository->nbCdd();
        $nbCdi = $this->employeRepository->nbCdi();
        $employes = $this->employeRepository->getEmployeWithRelation();
        $diff=0;
        foreach ($employes as $employe) {
            $date1=date_create(date('Y-m-d'));
            $date2 =date_create($employe->dateentre);
            $dateSortie = date_create($employe->findecontrat);
            $rest = date_diff($date1,$dateSortie);
            $dif=date_diff($date1,$date2);
            $rest = $rest->format('%a');
            $diff = $dif->format('%a')/365;
            $employe->anciennete = floor($diff);
            $employe->restant = $rest;
            $contrat = $this->contratRepository->getLasContratByEmployeId($employe->id);
            //var_dump($contrat);
            if(!empty($contrat->datedebut))
            $employe->datedebut =$contrat->datedebut;

        }
        return view('welcome',compact('nbStage','nbCdd','nbCdi','employes'));
    }
}
