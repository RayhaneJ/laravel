<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Postule;
use App\Models\Candidature;
use App\Models\Stagiaire;
use Auth;

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
        $stages = Stage::whereNotIn('id_stage', function($query2) {
            $query2->select('id_stage')->from(with(new Candidature)->getTable());})
            ->whereNotIn('id_stage', function($query3) {
                $query3->select('id_stage')->from(with(new Stagiaire)->getTable());})->paginate(6);
        $postule = Postule::where('no_nanterre', Auth::user()->id)->get();

        return view('stages', compact('stages'))->with('postules', $postule);
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
        $request->validate([
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

        return redirect('dashboard')->with('success', "L'offre de stage a bien été ajoutée"); 
    }
}
