<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $table = 'archives';
    protected $primaryKey = 'id_archives';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_archives',
        'id_stagiaire',
        'no_nanterre',
        'id_stage',
        'conventionValideEn',
        'conventionValideTu'
    ];

}
