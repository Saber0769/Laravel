<?php

// use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/listerMangas',[MangaController::class, 'getMangas']);
Route::get('/listerMangas', 'App\Http\Controllers\MangaController@getMangas');
/* Route::get('/listerMangasGenre/{idGenre}', 'App\Http\Controllers\MangaController@getMangasGenre'); Check laravel 5 P4*/
Route::get('/listerGenres/{erreur?}', 'App\Http\Controllers\GenreController@getGenres');
Route::post('/listerMangasGenre', 'App\Http\Controllers\MangaController@getMangasGenre');
Route::get('/modifierManga/{id}/{erreur?}', 'App\Http\Controllers\MangaController@updateManga');
Route::post('/validerManga', 'App\Http\Controllers\MangaController@validateManga');
