<?php

namespace App\Http\Controllers;

use App\Repositories\TypeCongeRepository;
use Illuminate\Http\Request;

class TypeCongeController extends Controller
{
    protected $typeCongeRepository;

    public function __construct(TypeCongeRepository $typeCongeRepository){
        $this->typeCongeRepository =$typeCongeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeConges = $this->typeCongeRepository->getAll();
        return view('typeConge.index',compact('typeConges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typeConge.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typeConges = $this->typeCongeRepository->store($request->all());
        return redirect('type-conge');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeConge = $this->typeCongeRepository->getById($id);
        return view('typeConge.show',compact('typeConge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeConge = $this->typeCongeRepository->getById($id);
        return view('typeConge.edit',compact('typeConge'));
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
        $this->typeCongeRepository->update($id, $request->all());
        return redirect('type-conge');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->typeCongeRepository->destroy($id);
        return redirect('type-conge');
    }
}
