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

Route::get('/stages', [App\Http\Controllers\StagesController::class, 'index'])->name('stages');

Route::get('/stages/create', [App\Http\Controllers\StagesController::class, 'create'])->name('createStage');

Route::post('/stages/store', [App\Http\Controllers\StagesController::class, 'store'])->name('storeStage');

Route::get('/stage/{id}', [App\Http\Controllers\StagesController::class, 'show'])->name('monStage');