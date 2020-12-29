<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tuteur extends Model
{
    protected $table = 'tuteurs';
    protected $primaryKey = 'no_nanterre';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_nanterre',
        'prenom',
        'nom',
        'dt_naiss',
        'no_tel',
        'statut'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'no_nanterre');
    }
}
