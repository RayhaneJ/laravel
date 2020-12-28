<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Stagiaire;
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

   
}
