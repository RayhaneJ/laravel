<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->get();

        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type_user = $request->input('type_user');
        $email = $request->input('email');
        $mdp = Hash::make($request->input('password'));

        DB::table('users')->insert(
            ['type_user' => $type_user, 'adresse_mail' => $email, 'mdp' => $mdp]
        );

        switch ($type_user) {
            case 'etudiants':
                return redirect()->action([EtudiantsController::class, 'store'], $request);
                break;  
            case 'entreprises':
                return redirect()->action([EntrepriseController::class, 'store'], $request);
                break;  
            case 'jurys':
                return redirect()->action([JurysController::class, 'store'], $request);
                break;  
            case 'tuteurs':
                return redirect()->action([TuteursController::class, 'store'], $request);
                break;  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entreprises = DB::table('users')->where('id', $id)->get();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('users.edit');
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
        $email = $request->input('email');
        $mdp = Hash::make($request->input('password'));

        DB::table('users')->insert(
            ['type_user' => $type_user, 'adresse_mail' => $email, 'mdp' => $mdp]
        );

        switch ($request->input('type_user')) {
            case 'etudiants':
                return redirect()->action([EtudiantsController::class, 'update'], $request);
                break;  
            case 'entreprises':
                return redirect()->action([EntrepriseController::class, 'update'], $request);
                break;  
            case 'jurys':
                return redirect()->action([JurysController::class, 'update'], $request);
                break;  
            case 'tuteurs':
                return redirect()->action([TuteursController::class, 'update'], $request);
                break;  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
    }
}
