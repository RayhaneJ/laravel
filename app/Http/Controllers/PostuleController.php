<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postule;

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

    public function destroy(Request $request) {
        Postule::where('id_stage', $request->id_stage)->where('no_nanterre', $request->user()->id)->delete();
    }
}
