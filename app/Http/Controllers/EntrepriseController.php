<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entreprises = DB::table('entreprises')->get();

        return view('entreprises.index', ['entreprises' => $entreprises]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enterprise.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mdp = Hash::make($request->input('mdp'));
        $mail = $request->input('mail');
        $noTel = $request->input('noTel');
        $noRue = $request->input('noRue');
        $nomRue = $request->input('nomRue');
        $ville = $request->input('ville');
        $cdPostal = $request->input('cdPostale');

        DB::table('entreprises')->insert(
            ['mdp' => $mdp, 'adresse_mail' => $mail, 'no_tel' => $noTel
            , 'no_rue' => $noRue, 'nom_rue' => $nomRue, 'vile' => $ville, 'cd_postal' => $cdPostal]
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
        $entreprises = DB::table('entreprises')->where('id_entreprise', $id)->get();
        return view('entreprise.index', ['entreprises' => $entreprises]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('enterprise.edit');
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
        $mail = $request->input('mail');
        $noTel = $request->input('noTel');
        $noRue = $request->input('noRue');
        $nomRue = $request->input('nomRue');
        $ville = $request->input('ville');
        $cdPostal = $request->input('cdPostale');

        DB::table('entreprises')
            ->where('id', $id)
            ->update(['adresse_mail' => $mail, 'no_tel' => $noTel
            , 'no_rue' => $noRue, 'nom_rue' => $nomRue, 'vile' => $ville, 'cd_postal' => $cdPostal]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('entreprises')->where('id_entreprise', $id)->delete();
    }
}
