<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;

class DirectorFilmController extends Controller
{
    public function getDirectorFilms(){
        $directorFilms = Director::with('films')->get();
        return $directorFilms;
    }

    public function getDirectorCountFilms(){

        $directorFilms = Director::withCount('films')->get();
        return $directorFilms;
    }
}
