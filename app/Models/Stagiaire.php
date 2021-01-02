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
        return $this->hasMany(Mission::class, 'id_stagiaire');
    }

    public function remarques(){
        return $this->hasMany(Remarque::class, 'id_stagiaire');
    }

    public function documents(){
        return $this->hasMany(Document::class, 'id_stagiaire');
    }

    public function etudiant(){
        return $this->belongsTo('App\Models\Etudiant', 'no_nanterre');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'no_nanterre');
    }

    public function estArchive(){
        if(Archive::where('id_stagiaire', $this->id_stagiaire)->exists()){
            return true;
        }
        else {
            return false;
        }
    }
}
