<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postule extends Model
{
    protected $table = 'postule';
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
}
