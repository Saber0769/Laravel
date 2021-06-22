<?php 
   namespace App\Http\Controllers;
   use Request; 
   // use Illuminate\Http\Request;
   use App\Models\Manga;
   use App\Models\Genre;
   use App\Models\Dessinateur;
   use App\Models\Scenariste;
   use Exception;
  
  

   class MangaController extends Controller{
         /**
      * afficher la liste de tous les Mangas
      * @return Vue listeMangas
      */
      
      public function getMangas(){
      // On récupère la liste de tous les Mangas 
         $mangas = Manga::all();
         
      // On affiche la liste de ces mangas  
         return view ('listeMangas', compact ('mangas'));
         
      }
      
      // public function getMangasGenre($idGenre) {
      //    // On récupère tout les Mangas du Genre choisi
      //    $mangas = Manga::where('id_genre', $idGenre)-> get();
         
      //    // On affiche la liste de ces Mangas
      //    return view('listeMangas', compact ('mangas'));
      // }
      
      // ====================(LARAVEL 5 P4)===================
      
      public function getMangasGenre(){
         $erreur = "";
         //on Récupere l'Id du genre sélectionné
         $id_genre = Request::input('cbGenre');

         //Si on a un id genre
         if ($id_genre) {
            $mangas = Manga::where('id_genre', $id_genre) -> get();

            // On affiche la liste de ces Mangas
               return view('listeMangas', compact ('mangas','erreur'));
         } else {
            $erreur = "Il faut Sélectioner un genre !";
            return redirect('/listerGenres/'.$erreur);
         }
      }
      // ====================(LARAVEL 5 P9)===================
      public function updateManga($id, $erreur=""){

         $manga         = Manga::find($id);
         $genres        = Genre::all();
         $dessinateurs  = Dessinateur::all();
         $scenaristes   = Scenariste::all();
         $titreVue      = "Modification d'un Manga";
         // Afficher le Formulaire en lui fournissant les données à afficher
         return view ('formManga', compact('manga', 'genres', 'dessinateurs', 'scenaristes', 'titreVue', 'erreur')); 
      }

      // ====================(LARAVEL 5 P11 & 12)===================

      public function validateManga(){
         
         // Récupérer des Valeurs Saisies
         $id_manga         = Request::input('id_manga');       //id dans champs caché
         $id_dessinateur   = Request::input('cbDessinateur');  //List déroulante
         $prix             = Request::input('prix'); 
         $id_scenariste    = Request::input('cbScenariste');  //List déroulante
         $titre            = Request::input('titre');
         $id_genre         = Request::input('cbGenre');        //List déroulante

         $id_manga = $Request->input('id_manga');
     
      // if (Request::hasFile('couverture')) {
            
      //       $image = Request::file('couverture');
      //       $couverture = $image -> getClientOriginalName();
      //       Request::file('couverture') -> move(base_path().'/public/images/', $couverture);
            
      //    } else {
      //       $couverture = Request::input('couvertureHidden');
      //    }
         $manga = Manga::find($id_manga);
         $manga -> titre         = $titre;
         $manga -> couverture    = $couverture;
         $manga -> prix          = $prix;
         $manga -> id_dessinateur= $id_dessinateur;
         $manga -> id_scenariste = $id_scenariste;
         $manga -> id_genre      = $id_genre;

         $erreur="";
         try {
            $manga->save();
            
         } catch (Exception $ex) {
            $erreur = $ex->getMessage();
            return redirect('/modiferManga/'.$id_manga."/".$erreur);
         }
          //On affiche la liste des Mangas
         return redirect('/listerMangas');
      }
}
