<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\Mission;
use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Stagiaire;
use App\Models\Postule;
use Auth;

class MissionController extends Controller
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
    Mission::create([
        'id_user' => $request->user()->id,
        'id_stagiaire' => $request->id_stagiaire,
        'titre_mission' => $request->titre_tache,
        'mission' => $request->desc_tache,
    ]); 
   }

}
