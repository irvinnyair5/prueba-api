<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDirectorRequest;
use App\Http\Requests\UpdateDirectorRequest;
use App\Models\Director;
use Illuminate\Http\Request;

use App\Repositories\DirectorRepositoryInterface;

class DirectorController extends Controller
{

    protected $directorRepository;

    public function __construct(DirectorRepositoryInterface $directorRepository)
    {
        $this->directorRepository = $directorRepository;
    }

    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *     path="/api/directors",
     *     summary="ALL DIRECTORS",
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa"
     *     )
     * )
     */

    public function index()
    {
        $directors = $this->directorRepository->getAll();

        return $directors;
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
     *     path="/api/directors",
     *     summary="CREATE DIRECTOR",
    *     @OA\RequestBody(
    *         required=true,
    *         @OA\JsonContent(
    *             required={"name"},
    *             @OA\Property(property="name", type="string", example="Value 1")
    *         )
    *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa"
     *     )
     * )
     */

    public function store(StoreDirectorRequest $request)
    {

        $director = Director::firstOrCreate($request->input());
        return $director;

    }

    /**
     * Display the specified resource.
    */
    /**
     * @OA\Get(
     *     path="/api/directors/{id}",
     *     summary="SHOW A DIRECTOR",
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
        //$director = Director::find($id);
        $director = $this->directorRepository->findById($id);
        return $director;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
     /**
     * @OA\Put(
     *     path="/api/directors/{id}",
     *     summary="UPDATE A DIRECTOR",
      *     @OA\Parameter(
        *         name="id",
        *         in="path",
        *         required=true,
        *         @OA\Schema(type="integer")
        *     ),
            *     @OA\RequestBody(
    *         required=true,
    *         @OA\JsonContent(
    *             required={"name"},
    *             @OA\Property(property="name", type="string", example="Value 1")
    *         )
    *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa"
     *     )
     * )
     */

    public function update(UpdateDirectorRequest $request, $id)
    {
        $director = Director::findOrFail($id);
        $director->update($request->input());
        return $director;
    }

    /**
     * Remove the specified resource from storage.
     */
     /**
     * @OA\Delete(
     *     path="/api/directors/{id}",
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
        $director = Director::find($id);
        $director->delete();
        return $director;
    }
}
