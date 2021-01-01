<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    protected $table = 'stagiaires';
    protected $primaryKey = 'id_stagiaire';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_stagiaire',
        'no_nanterre',
        'id_stage',
        'conventionValideEn',
        'conventionValideTu'
    ];

    public function stage(){
        return $this->belongsTo('App\Models\Stage', 'id_stage');
    }

    public function missions(){
        return $this->hasMany(Mission::class, 'id_mission');
    }

    public function remarques(){
        return $this->hasMany(Remarque::class, 'id_remarque');
    }

    public function documents(){
        return $this->hasMany(Document::class, 'id_doc');
    }

    public function etudiant(){
        return $this->belongsTo('App\Models\Etudiant', 'no_nanterre');
    }
}
