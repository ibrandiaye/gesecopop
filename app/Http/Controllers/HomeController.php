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
        return view('home');
    }
}
