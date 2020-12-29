<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postule;
use App\Models\Stage;
use App\Models\Candidature;
use Auth;


class PostuleController extends Controller
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
        Postule::create([
            'no_nanterre' => $request->user()->id,
            'id_stage' => $request->id_stage,
        ]); 
    }

    public function index() {
        $candidatures = Postule::whereIn('id_stage', function($query) {
            $query->select('id_stage')
            ->from(with(new Stage)->getTable())
            ->where('id_entreprise', Auth::user()->id);
        })->whereNotIn('id_stage', function($query2) {
            $query2->select('id_stage')->from(with(new Candidature)->getTable());
        })->paginate(8);

        return view('candidatures', compact('candidatures'));
    }

    public function show() {
        $postules = Postule::where('no_nanterre', Auth::user()->id)->paginate(6);
        return view('mescandidatures', compact('postules'));
    }

    public function destroy(Request $request) {
        Postule::where('id_stage', $request->id_stage)->where('no_nanterre', $request->user()->id)->delete();
    }
}
