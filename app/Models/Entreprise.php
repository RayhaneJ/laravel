<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{

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
}
