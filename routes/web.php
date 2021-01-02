<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [App\Http\Controllers\UserController::class, 'show'])->name('users');

Route::delete('/users/delete', [App\Http\Controllers\UserController::class, 'destroy'])->name('usersDelete');

Route::post('/archive', [App\Http\Controllers\ArchiveController::class, 'store'])->name('archive');

Route::get('/candidature/{id}{stage}', [App\Http\Controllers\CandidatureController::class, 'show'])->name('candidatureProfile');

Route::get('/stages', [App\Http\Controllers\StagesController::class, 'index'])->name('stages');

Route::get('/stages/create', [App\Http\Controllers\StagesController::class, 'create'])->name('createStage');

Route::post('/stages/store', [App\Http\Controllers\StagesController::class, 'store'])->name('storeStage');

Route::get('/stage', [App\Http\Controllers\StagiairesController::class, 'show'])->name('monStage');

Route::post('/stage/accepte', [App\Http\Controllers\StagiairesController::class, 'store'])->name('accepteStage');

Route::get('/stage/details/{id}', [App\Http\Controllers\StagiairesController::class, 'viewDetails'])->name('viewDetails');

Route::get('/stagiaires', [App\Http\Controllers\StagiairesController::class, 'index'])->name('stagiaires');

Route::post('/stagiaires/valideConvention', [App\Http\Controllers\StagiairesController::class, 'valideConvention'])->name('valideConvention');

Route::post('/stagiaires/invalidConvention', [App\Http\Controllers\StagiairesController::class, 'invalidConvention'])->name('invalidConvention');

Route::get('/stagiaires/consulteTaches/{id}', [App\Http\Controllers\StagiairesController::class, 'consulteTaches'])->name('consulteTaches');

Route::get('/candidatures/consulte', [App\Http\Controllers\PostuleController::class, 'show'])->name('mescandidatures');

Route::get('/candidatures', [App\Http\Controllers\PostuleController::class, 'index'])->name('candidatures');

Route::post('/candidatures/attente', [App\Http\Controllers\CandidatureController::class, 'store'])->name('candidaturesAttente');

Route::post('/stagiaires/ajouteTache', [App\Http\Controllers\MissionController::class, 'store'])->name('ajouteTache');

Route::get('/candidatures/retenues', [App\Http\Controllers\CandidatureController::class, 'index'])->name('mesCandidaturesRetenues');

Route::get('/missions/{id_stagiaire}', [App\Http\Controllers\MissionController::class, 'index'])->name('missions');

Route::get('/students/{tuteurId}', [App\Http\Controllers\StagiairesController::class, 'exportStudent'])->name('exportStudent');

Route::post('/postule', [App\Http\Controllers\PostuleController::class, 'store'])->name('postule');

Route::delete('/postule/delete', [App\Http\Controllers\PostuleController::class, 'destroy'])->name('postuleDelete');

Route::get('/chat/{id}' , App\Http\Livewire\ChatRoom::class);

Route::get('/download/cv/{file}', function ($file='') {
    $filepath = public_path('storage/cv/').$file;
    return response()->download($filepath); 
});

Route::get('/download/lm/{file}', function ($file='') {
    $filepath = public_path('storage/lm/').$file;
    return response()->download($filepath); 
});

Route::get('/download/file/{file}', function ($file='') {
    $filepath = public_path('storage/file/').$file;
    return response()->download($filepath); 
});