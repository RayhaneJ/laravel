<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $table = 'offrestages';
    public $timestamps = false;
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
}
