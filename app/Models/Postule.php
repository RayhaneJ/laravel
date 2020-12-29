<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Candidature;
use DB;
use Log;

class Postule extends Model
{
    protected $table = 'postule';
    protected $primaryKey = 'no_nanterre';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_nanterre',
        'id_stage',
    ];

    public function stage(){
        return $this->belongsTo('App\Models\Stage', 'id_stage');
    }

    public function etudiant(){
        return $this->belongsTo('App\Models\Etudiant', 'no_nanterre');
    }

    public function isAccepted(){
        if(Candidature::where('no_nanterre', $this->no_nanterre)->where('id_stage', $this->id_stage)->exists()) {
            return true;
        }
        else {
            return false;
        }
    }
}
