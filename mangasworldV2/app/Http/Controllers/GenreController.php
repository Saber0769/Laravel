<?php
namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Session;



class GenreController extends Controller{
    
        /**
     * Récupère la liste des genres 
     * @return la vue formGenre
     */
     public function getFormGenres() {
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        $client = new Client();
        $uri = 'http://localhost/mangasworldAPI/public/api/genre';
        $response = $client->request('GET', $uri);
        $genres = json_decode($response->getBody()->getContents());
        return view('formGenre', compact('genres', 'erreur'));
    }
    
    /**
     * Récupère la liste des genres 
     * @return Collection de Genre
     */
    public function getGenres() {
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        $genres = Genre::all();
            return view('formGenre', compact('genres', 'erreur'));
    }
}