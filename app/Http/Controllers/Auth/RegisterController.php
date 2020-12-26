<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Etudiant;
use App\Models\Jury;
use App\Models\Tuteur;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        switch($data['role']) {
            case "et":
                return $this->validateStudent($data);
            case "ju":
                return $this->validateTeacher($data);
            case "tu":
                return $this->validateTeacher($data);
            case "en":
                return $this->validateEnterprise($data);
        }
    }

    protected function validateStudent(array $data){
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nom' => ['required', 'string'],
            'prenom' => ['required', 'string'],
            'classe' => ['required', 'string'],
            'telUser' => ['required', 'string'],
            'date' => ['required', 'string'],
        ]);
    }

    protected function validateTeacher(array $data){
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nom' => ['required', 'string'],
            'prenom' => ['required', 'string'],
            'statut' => ['required', 'string'],
            'telUser' => ['required', 'string'],
            'date' => ['required', 'string'],
        ]);
    }

    protected function validateEnterprise(array $data){
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'ville' => ['required', 'string'],
            'rue' => ['required', 'string'],
            'noRue' => ['required', 'string'],
            'cp' => ['required', 'string'],
            'telEntreprise' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = $this->createUser($data);
        
        switch($data['role']) {
            case "et":
                $this->createStudent($data, $user['id']);
                break;
            case "ju":
                $this->createJury($data, $user['id']);
                break;
            case "tu":
                $this->createTuteur($data, $user['id']);
                break;
            case "en":
                $this->createEntreprise($data, $user['id']);
                break;
        }

        return $user;
    }

    protected function createUser($data) {
        return User::create([
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function createStudent($data, $userId) {
        Etudiant::create([
            'no_nanterre' => $userId,
            'prenom' => $data['prenom'],
            'nom' => $data['nom'],
            'dt_naiss' => $data['date'],
            'no_tel' => $data['telUser'],
            'classe' => $data['classe'],
        ]);
    }

    protected function createJury($data, $userId) {
        Jury::create([
            'no_nanterre' => $userId,
            'prenom' => $data['prenom'],
            'nom' => $data['nom'],
            'dt_naiss' => $data['date'],
            'no_tel' => $data['telUser'],
            'statut' => $data['statut'],
        ]);
    }

    protected function createTuteur($data, $userId) {
        Tuteur::create([
            'no_nanterre' => $userId,
            'prenom' => $data['prenom'],
            'nom' => $data['nom'],
            'dt_naiss' => $data['date'],
            'no_tel' => $data['telUser'],
            'statut' => $data['statut'],
        ]);
    }

    protected function createEntreprise($data, $userId) {
        Entreprise::create([
            'id_entreprise' => $userId,
            'no_rue' => $data['noRue'],
            'nom_rue' => $data['rue'],
            'no_tel' => $data['telEntreprise'],
            'ville' => $data['ville'],
            'cd_postal' => $data['cp'],
        ]);
    }
}
