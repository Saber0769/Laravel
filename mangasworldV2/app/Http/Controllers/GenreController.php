<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Genre;


class GenreController extends Controller{
    
    public function getGenres($erreur="") {
        $genres = Genre::all();
            return view('formGenre', compact('genres', 'erreur'));
    }
}