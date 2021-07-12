<?php

namespace App\Http\Controllers;

use App\Repositories\ContratRepository;
use App\Repositories\EmployeRepository;
use Illuminate\Http\Request;

class ContratController extends Controller
{
    protected $contratRepository;
    protected $employeRepository;

    public function __construct(ContratRepository $contratRepository,EmployeRepository $employeRepository){
        $this->contratRepository =$contratRepository;
        $this->employeRepository = $employeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contrats = $this->contratRepository->getAll();

        return view('contrat.index',compact('contrats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employes = $this->employeRepository->getAll();
        return view('contrat.add',compact('employes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contrats = $this->contratRepository->store($request->all());
        return redirect('contrat');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contrat = $this->contratRepository->getById($id);
        return view('contrat.show',compact('contrat'));
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
        $contrat = $this->contratRepository->getById($id);
        return view('contrat.edit',compact('contrat','employes'));
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
        $this->contratRepository->update($id, $request->all());
        return redirect('contrat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->contratRepository->destroy($id);
        return redirect('contrat');
    }
}
