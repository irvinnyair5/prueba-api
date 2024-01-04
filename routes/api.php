<?php

use App\Http\Controllers\DirectorController;
use App\Http\Controllers\DirectorFilmController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\FilmControllerDirector;
use App\Http\Controllers\FilmDirectorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['api' => 'api'], function () {

    Route::apiResource('directors', DirectorController::class);
    Route::apiResource('films', FilmController::class);

    Route::get('director/films', [DirectorFilmController::class, 'getDirectorFilms']);
    Route::get('director/films_count', [DirectorFilmController::class, 'getDirectorCountFilms']);

    Route::get('film/director', [FilmDirectorController::class, 'getFilmDirector']);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
