<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stage;

class StagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('stages');
    }

    public function show($id)
    {
        return view('monStage');
    }

    public function create()    
    {
        return view('createStage');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'titre_stage' => 'required|unique:offrestages|max:255',
            'description' => 'required',
            'dateDebut' => 'required',
            'dateFin' => 'required',
            'duree' => 'required',
        ]);

        Stage::create([
            'id_entreprise' => $request->id_entreprise,
            'titre_stage' => $request->titre_stage,
            'desc_stage' => $request->description,
            'deb_stage' => $request->dateDebut,
            'fin_stage' => $request->dateFin,
            'duree' => $request->duree,
        ]); 
    }
}
