<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';
    public $timestamps = false;
    protected $primaryKey = 'id_doc';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_doc',
        'id_remarque',
        'id_stagiaire',
        'path',
    ];

    public function remarque(){
        return $this->belongsTo('App\Models\Remarque', 'id_remarque');
    }

    public function stagiaire(){
        return $this->belongsTo('App\Models\Stagiaire', 'id_stagiaire');
    }
}
