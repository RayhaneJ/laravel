<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $table = 'entreprises';
    protected $primaryKey = 'id_entreprise';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_entreprise',
        'no_tel',
        'no_rue',
        'nom_rue',
        'ville',
        'cd_postal'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'no_nanterre');
    }
}
