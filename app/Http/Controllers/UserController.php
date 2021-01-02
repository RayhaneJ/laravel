<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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

    public function show(){
        $users = User::paginate(10);
        return view('consulteUtilisateurs', compact('users'));
    }

    public function destroy(Request $request) {
        User::where('id', $request->id)->delete();
    }
}
