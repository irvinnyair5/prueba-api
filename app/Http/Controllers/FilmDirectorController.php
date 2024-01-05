<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmDirectorController extends Controller
{

     /**
     * @OA\Get(
     *     path="/api/film/director",
     *     summary="ALL FILMS AND THEIR DIRECTOR",
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa"
     *     )
     * )
     */

    public function getFilmDirector(){
        $filmDirector = Film::with('director')->get();

        return $filmDirector;
    }
}
