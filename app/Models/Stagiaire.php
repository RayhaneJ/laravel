<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    protected $table = 'stagiaires';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_nanterre',
        'id_stage',
        'id_doc',
        'id_mission',
        'id_remarque',
        'conventionValideEn',
        'conventionValideTu'
    ];

    public function stage(){
        return $this->belongsTo('App\Models\Stage', 'id_stage');
    }

    public function etudiant(){
        return $this->belongsTo('App\Models\Etudiant', 'no_nanterre');
    }
}
