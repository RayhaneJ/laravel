<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidature;
use App\Models\Etudiant;
use Auth;


class CandidatureController extends Controller
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

    public function store(Request $request){
        Candidature::create([
            'no_nanterre' => $request->no_nanterre,
            'id_stage' => $request->id_stage,
        ]); 
    }

    public function index(){
        $candidaturesAttente = Candidature::where('no_nanterre', Auth::user()->id)->paginate(8);
        return view('mesCandidaturesEnAttente', compact('candidaturesAttente'));
    }

    public function show($id, $stage){
        $etudiant = Etudiant::where('no_nanterre', $id)->first();
        return view('candidatureProfile')->with('etudiant', $etudiant)->with('stage', $stage);
    }
}
