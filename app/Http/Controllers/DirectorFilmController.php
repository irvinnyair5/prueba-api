<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;
use App\DTO\Directors;
class DirectorFilmController extends Controller
{
      /**
     * @OA\Get(
     *     path="/api/director/films",
     *     summary="ALL DIRECTORS AND THEIR FILMS",
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa"
     *     )
     * )
     */
    public function getDirectorFilms(){
        $directorFilms = Director::with('films')->get();
        return $directorFilms;
    }

    /**
     * @OA\Get(
     *     path="/api/director/films_count",
     *     summary="ALL DIRECTORS AND TOTAL THEIR FILMS",
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa"
     *     )
     * )
     */

    public function getDirectorCountFilms(){
        $directorFilms = Director::withCount('films')->get();
        return $directorFilms;
    }

       /**
     * @OA\Get(
     *     path="/api/director/{id}/films_dto",
     *     summary="SHOW A DIRECTORS, TOTAL THEIR FILMS AND DTO",
           *     @OA\Parameter(
        *         name="id",
        *         in="path",
        *         required=true,
        *         @OA\Schema(type="integer")
        *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa"
     *     )
     * )
     */

    public function getDirectorFilmsDTO($id){

        $directorFilms = Director::withCount('films')->where('id',$id)->first();

        $filmDTO = Directors::frmDirector($directorFilms);
        return response()->json($filmDTO);
    }
}
