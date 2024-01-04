<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostFilm;
use App\Models\Film;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
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
    public function store(StorePostFilm $request)
    {

        $validate = $request->validate();
        $film = Film::firstOrCreate($validate);
        return $film;
    }

    /**
     * Display the specified resource.
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
    public function update(Request $request, $id)
    {
        $film = Film::find($id);

        //$film->director_id =  $request->input('director_id');
        $film->name = $request->input('name');
        $film->update();

        return $film;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $film = Film::find($id);
        $film->delete();

        return $film;
    }
}
