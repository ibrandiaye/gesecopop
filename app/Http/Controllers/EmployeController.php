<?php

namespace App\Http\Controllers;

use App\Contrat;
use App\Repositories\EmployeRepository;
use App\Repositories\ProjetRepository;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    protected $employeRepository;
    protected $projetRepository;

    public function __construct(EmployeRepository $employeRepository, ProjetRepository $projetRepository){
        $this->employeRepository =$employeRepository;
        $this->projetRepository = $projetRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $employes = $this->employeRepository->getEmployeWithRelation();
        $diff=0;
        foreach ($employes as $employe) {
            $date1=date_create(date('Y-m-d'));
            $date2 =date_create($employe->dateentre);
            $dif=date_diff($date1,$date2);
            $diff = $dif->format('%a')/365;
            $employe->anciennete = floor($diff);

        }
       // dd($employes);
        return view('employe.index',compact('employes','diff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projets = $this->projetRepository->getAll();
        return view('employe.add',compact('projets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->image){
            $image = time().'.'.$request->image->extension();
            $request->image->move('image/', $image);
            $request->merge(['photo'=>$image]);
        }
        $employe = $this->employeRepository->store($request->all());
        $contrat = new Contrat();
        $contrat->datedebut = $employe->dateentre;
        $contrat->datefin = $employe->findecontrat;
        $contrat->type = $employe->statut;
        $contrat->employe_id = $employe->id;
        $contrat->poste = $request['poste'];
        $contrat->save();

        return redirect('employe');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employe = $this->employeRepository->getById($id);
        return view('employe.show',compact('employe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projets = $this->projetRepository->getAll();
        $employe = $this->employeRepository->getById($id);
        return view('employe.edit',compact('employe','projets'));
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
        if($request->image){
            $image = time().'.'.$request->image->extension();
            $request->image->move('image/', $image);
            $request->merge(['photo'=>$image]);
        }
        $this->employeRepository->update($id, $request->all());
        return redirect('employe');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->employeRepository->destroy($id);
        return redirect('employe');
    }
}
