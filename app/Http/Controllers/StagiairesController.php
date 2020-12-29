<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Stagiaire;
use App\Models\Postule;
use Auth;

class StagiairesController extends Controller
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

    public function show()
    {
        $stagiaires = Stagiaire::where('no_nanterre', Auth::user()->id)->get();
        return view('monStage')->with('stagiaires', $stagiaires);
    }

   public function store(Request $request){
    Stagiaire::create([
        'no_nanterre' => $request->user()->id,
        'id_stage' => $request->id_stage,
    ]); 

    Candidature::where('id_stage', $request->id_stage)->where('no_nanterre', $request->user()->id)->delete();
    Postule::where('id_stage', $request->id_stage)->where('no_nanterre', $request->user()->id)->delete();
    
    return redirect('stage'); 
   }
}
