<?php

namespace App\Models;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $table = 'etudiants';
    protected $primaryKey = 'no_nanterre';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_nanterre',
        'no_nanterre_1',
        'prenom',
        'nom',
        'dt_naiss',
        'no_tel',
        'classe',
        'cv',
        'lettre_motiv'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'no_nanterre');
    }

    public function tuteur() {
        return $this->belongsTo('App\Models\Tuteur', 'no_nanterre_1');
    }

    public function stage() {
        return $this->hasOne(Stagiaire::class, 'no_nanterre');
    }


    /**
     * Update the user's profile photo.
     *
     * @param  \Illuminate\Http\UploadedFile  $cv
     * @return void
     */
    public function updateCV(UploadedFile $cv)
    {
        tap($this->cv, function ($previous) use ($cv) {
            $this->forceFill([
                'cv' => $cv->storePublicly(
                    'cv', ['disk' => $this->fileDisk()]
                ),
            ])->save();

            if ($previous) {
                Storage::disk($this->fileDisk())->delete($previous);
            }
        });
    }

    public function updateLM(UploadedFile $lm)
    {
        tap($this->lettre_motiv, function ($previous) use ($lm) {
            $this->forceFill([
                'lettre_motiv' => $lm->storePublicly(
                    'lm', ['disk' => $this->fileDisk()]
                ),
            ])->save();

            if ($previous) {
                Storage::disk($this->fileDisk())->delete($previous);
            }
        });
    }

    protected function fileDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : 'public';
    }
}
