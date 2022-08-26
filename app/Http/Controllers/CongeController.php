<?php

namespace App\Http\Controllers;

use App\Repositories\CongeRepository;
use App\Repositories\EmployeRepository;
use App\Repositories\TypeCongeRepository;
use Illuminate\Http\Request;

class CongeController extends Controller
{
    protected $congeRepository;
    protected $employeRepository;
    protected $typeCongeRepository;

    public function __construct(CongeRepository $congeRepository,EmployeRepository $employeRepository,
    TypeCongeRepository $typeCongeRepository){
        $this->congeRepository =$congeRepository;
        $this->employeRepository = $employeRepository;
        $this->typeCongeRepository = $typeCongeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conges = $this->congeRepository->getAll();

        return view('conge.index',compact('conges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employes = $this->employeRepository->getAll();
        $typeConges = $this->typeCongeRepository->getAll();
        return view('conge.add',compact('employes','typeConges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $conges = $this->congeRepository->getCongeByEmployeeByAnnee($request['employe_id'],$request['annee'],$request['type_conge_id']);
        //dd($conges);
        $cong = 0;
        $typeConge = $this->typeCongeRepository->getById($request['type_conge_id']);
        //dd($typeConge);
        foreach ($conges as $key => $conge) {
            $datetime1 = date_create($conge->date_debut);
            $datetime2 = date_create($conge->date_fin);

            // calculates the difference between DateTime objects
            $interval = date_diff($datetime1, $datetime2);
           // dd($interval->format('%a'));
            $cong = $interval->format('%a') + $cong;

        }
        //dd($cong);
        if($cong + $request['duree'] <= $typeConge->nbj){
            $conge = $this->congeRepository->store($request->all());
            return redirect('conge');
        }else{
            return back()->with('error','l\'employe n\'a plus droit à un congé de '.$request['duree'].' jours')->withInput();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conge = $this->congeRepository->getById($id);
        return view('conge.show',compact('conge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employes = $this->employeRepository->getAll();
        $conge = $this->congeRepository->getById($id);
        $typeConges = $this->typeCongeRepository->getAll();
        return view('conge.edit',compact('conge','employes','typeConges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->congeRepository->update($id, $request->all());
        return redirect('conge');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->congeRepository->destroy($id);
        return redirect('conge');
    }
}
