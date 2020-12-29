<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    protected $table = 'candidaturesAttente';
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
}
