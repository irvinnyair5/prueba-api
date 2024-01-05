<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
use App\Models\Film;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *     path="/api/films",
     *     summary="ALL FILMS",
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa"
     *     )
     * )
     */

    public function index()
    {
        $films = Film::all();

        return $films;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * @OA\Post(
     *     path="/api/films",
     *     summary="CREATE FILM",
    *     @OA\RequestBody(
    *         required=true,
    *         @OA\JsonContent(
    *             required={"director_id"},
    *             required={"name"},
    *             @OA\Property(property="director_id", type="integer", example="1", description="add director previously mind and recover id"),
    *             @OA\Property(property="name", type="string", example="Value 1")
    *         )
    *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa"
     *     )
     * )
     */


    public function store(StoreFilmRequest $request)
    {
        $film = Film::firstOrCreate($request->input());
        return $film;
    }

    /**
     * Display the specified resource.
     */
    /**
     * @OA\Get(
     *     path="/api/films/{id}",
     *     summary="SHOW A FILM",
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


    public function show(string $id)
    {
        $film = Film::find($id);

        return $film;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * @OA\Put(
     *     path="/api/films/{id}",
     *     summary="UPDATE A FILM",
      *     @OA\Parameter(
        *         name="id",
        *         in="path",
        *         required=true,
        *         @OA\Schema(type="integer")
        *     ),
            *     @OA\RequestBody(
    *         required=true,
    *         @OA\JsonContent(
    *             required={"director_id"},
    *             required={"name"},
    *             @OA\Property(property="director_id", type="integer", example="1", description="add director previously mind and recover id"),
    *             @OA\Property(property="name", type="string", example="Value 1")
    *         )
    *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa"
     *     )
     * )
     */

    public function update(UpdateFilmRequest $request, $id)
    {
        $director = Film::findOrFail($id);
        $director->update($request->input());
        return $director;
    }

    /**
     * Remove the specified resource from storage.
     */
         /**
     * @OA\Delete(
     *     path="/api/films/{id}",
     *     summary="DELETE A DIRECTOR",
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

    public function destroy($id)
    {

        $film = Film::find($id);
        $film->delete();

        return $film;
    }
}
