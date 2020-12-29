<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use Auth;


class EtudiantController extends Controller
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

    public function show($id){
        $etudiant = Etudiant::where('no_nanterre', $id);

        return view('candidatureProfile')->with('etudiant', $etudiant);
    }
}
