<?php

namespace App\Http\Controllers;

use App\Repositories\EmployeRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $employeRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EmployeRepository $employeRepository)
    {
        $this->middleware('auth');
        $this->employeRepository = $employeRepository;
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
            $dif=date_diff($date1,$date2);
            $diff = $dif->format('%a')/365;
            $employe->anciennete = floor($diff);

        }
        return view('welcome',compact('nbStage','nbCdd','nbCdi','employes'));
    }
}
