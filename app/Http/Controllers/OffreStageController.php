<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OffreStageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offrestages = DB::table('offrestages')->get();

        return view('offrestages.index', ['offrestages' => $offrestages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offrestages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $titre = $request->input('titre');
        $deb = $request->input('deb');
        $fin = $request->input('fin');
        $duree = $request->input('duree');
        $desc_stage = $request->input('desc_stage');

        DB::table('offrestages')->insert(
            ['titre' => $titre, 'deb' => $deb, 'fin' => $fin, 'duree' => $duree, 'desc_stage' => $desc_stage]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entreprises = DB::table('offfreStages')->where('id_stage', $id)->get();
        return view('offfreStages.index', ['offfreStages' => $offfreStages]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('offfreStages.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $titre = $request->input('titre');
        $deb = $request->input('deb');
        $fin = $request->input('fin');
        $duree = $request->input('duree');
        $desc_stage = $request->input('desc_stage');

        DB::table('offrestages')->insert(
            ['titre' => $titre, 'deb' => $deb, 'fin' => $fin, 'duree' => $duree, 'desc_stage' => $desc_stage]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('offrestages')->where('id_stage', $id)->delete();
    }
}
