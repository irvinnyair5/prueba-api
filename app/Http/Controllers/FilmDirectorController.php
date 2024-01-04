<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmDirectorController extends Controller
{
    public function getFilmDirector(){
        $filmDirector = Film::with('director')->get();

        return $filmDirector;
    }
}
