<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Remarque extends Model
{
    protected $table = 'remarques';
    public $timestamps = false;
    protected $primaryKey = 'id_remarque';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_remarque',
        'id_user',
        'id_stagiaire',
        'remarque',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function stagiaire(){
        return $this->belongsTo('App\Models\Stagiaire', 'id_stagiaire');
    }
}
