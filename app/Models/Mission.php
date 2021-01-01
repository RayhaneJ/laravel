<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $table = 'missions';
    public $timestamps = true;
    protected $primaryKey = 'id_mission';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_mission',
        'id_user',
        'id_stagiaire',
        'titre_mission',
        'mission',
        'fait'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function stagiaire(){
        return $this->belongsTo('App\Models\Stagiaire', 'id_stagiaire');
    }
}
