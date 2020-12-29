<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $table = 'etudiants';
    protected $primaryKey = 'no_nanterre';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_nanterre',
        'no_nanterre_1',
        'prenom',
        'nom',
        'dt_naiss',
        'no_tel',
        'classe'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'no_nanterre');
    }

    public function tuteur() {
        return $this->belongsTo('App\Models\Tuteur', 'no_nanterre_1');
    }
}
