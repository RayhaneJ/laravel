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

    public function index()
    {
        $stagiaires = Stagiaire::where('id_stage', function($query2) {
            $query2->select('id_stage')->from(with(new Stage)->getTable())->where('id_entreprise', Auth::user()->id);})
            ->paginate(6);

        return view('consulteStagiaires', compact('stagiaires'));
    }

    public function show()
    {
        $stagiaires = Stagiaire::where('no_nanterre', Auth::user()->id)->first();
        return view('monStage')->with('stagiaires', $stagiaires);
    }

    public function viewDetails($id)
    {
        $stagiaires = Stagiaire::where('no_nanterre', $id)->first();

        if(Stage::where('id_entreprise', Auth::user()->id)
            ->where('id_stage', $stagiaires->id_stage)->exists()) 
        {
            return view('viewDetailStage')->with('stagiaires', $stagiaires);
        }
        else if(Auth::user()->id == $id) {
            return view('viewDetailStage')->with('stagiaires', $stagiaires);
        }
        else {
            return response('Unauthorized.', 401);
        }
    }

    public function consulteTaches($id){
        $taches = Stagiaire::where('id_stagiaire', $id);
        return view('consulteTaches')->with('taches', $taches);
    }

    public function valideConvention(Request $request) {
        if(Auth::user()->role == "tu") 
        {
            Stagiaire::where('no_nanterre', $request->no_nanterre)->update(['conventionValideTu' => 1]);
        }
        else if(Auth::user()->role == "en") {
            Stagiaire::where('no_nanterre', $request->no_nanterre)->update(['conventionValideEn' => 1]);
        }
    }

    public function invalidConvention(Request $request) {
        if(Auth::user()->role == "tu") 
        {
            Stagiaire::where('no_nanterre', $request->no_nanterre)->update(['conventionValideTu' => 0]);
        }
        else if(Auth::user()->role == "en") {
            Stagiaire::where('no_nanterre', $request->no_nanterre)->update(['conventionValideEn' => 0]);
        }
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
