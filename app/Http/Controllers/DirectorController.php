<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostDirector;
use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directors = Director::all();

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
    public function store(StorePostDirector $request)
    {

        $validate = $request->validate();
        $director = Director::firstOrCreate($validate);
        return $director;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $director = Director::find($id);
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
    public function update(Request $request, $id)
    {
        $director = Director::find($id);
        $director->name = $request->input('name');
        $director->update();

        return $director;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $director = Director::find($id);
        $director->delete();
        return $director;
    }
}
