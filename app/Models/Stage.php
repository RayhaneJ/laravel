<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $table = 'offrestages';
    protected $primaryKey = 'id_stage';
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_entreprise',
        'titre_stage',
        'deb_stage',
        'fin_stage',
        'duree',
        'desc_stage'
    ];

    public function entreprise(){
        return $this->belongsTo('App\Models\Entreprise', 'id_entreprise');
    }

}
