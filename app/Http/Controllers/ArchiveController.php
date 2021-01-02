<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Stagiaire;
use App\Models\User;
use Illuminate\Http\Request;

class ArchiveController extends Controller
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

    public function store(Request $request) {
        $stagiaire = Stagiaire::where('id_stagiaire', $request->id_stagiaire)->first();
        Archive::create([
            'id_stagiaire' => $stagiaire->id_stagiaire,
            'no_nanterre' => $stagiaire->no_nanterre,
            'id_stage' => $stagiaire->id_stage,
            'conventionValideEn' => $stagiaire->conventionValideEn,
            'conventionValideTu' => $stagiaire->conventionValideTu,
        ]); 
    }
}
