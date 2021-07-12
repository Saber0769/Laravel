<?php 
   namespace App\Http\Controllers;
   use Request; 
   //use Illuminate\Http\Request;
   // use App\Http\Controllers\Controller;
   use App\Models\Manga;
   use App\Models\Genre;
   use App\Models\Dessinateur;
   use App\Models\Scenariste;
   use Exception;
   use Session;
   use Validator;



   class MangaController extends Controller{
         /**
      * afficher la liste de tous les Mangas
      * @return Vue listeMangas
      */
      
      public function getMangas(){
         $erreur = Session::get('erreur');
         Session::forget('erreur');
      // On récupère la liste de tous les Mangas 
         $mangas = Manga::all();
         
      // On affiche la liste de ces mangas  
         return view ('listeMangas', compact ('mangas','erreur'));
         
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
            Session::put('erreur',$erreur);
            return redirect('/listerGenres/');
         }
      }
      // ====================(LARAVEL 5 P9)===================
       // ========== update Manga ==========
         public function updateManga($id){
            $erreur = Session::get('erreur');
            Session::forget('erreur'); 
            $manga         = Manga::find($id);
            $genres        = Genre::all();
            $dessinateurs  = Dessinateur::all();
            $scenaristes   = Scenariste::all();
            $titreVue      = "Modification d'un Manga";
            // Afficher le Formulaire en lui fournissant les données à afficher
            return view ('formManga', compact('manga', 'genres', 'dessinateurs', 'scenaristes', 'titreVue', 'erreur')); 
         }
      // ====================(LARAVEL 5 P14)===================
       // ========== Ajouter Manga ==========
      public function  addManga(){
         $erreur = Session::get('erreur');
         Session::forget('erreur');         
         $manga         = new Manga;
         $genres        = Genre::all();
         $dessinateurs  = Dessinateur::all();
         $scenaristes   = Scenariste::all();
         $titreVue      = "Ajout d'un Manga";
          // Afficher le Formulaire en lui fournissant les données à afficher
         return view ('formManga', compact('manga', 'genres', 'dessinateurs', 'scenaristes', 'titreVue', 'erreur'));           
      }

      // ====================(LARAVEL 5 P11 & 12)===================
       // ========== Valider Manga ==========
      public function validateManga(){

         // Récupération des valeurs saisies
         $id_manga = Request::input('id_manga'); // id dans le champs caché
         // Liste des champs à vérifier
         $regles = array(
            'titre' => 'required',
            'prix' => 'required | numeric',
            'cbScenariste' => 'required',
            'cbGenre' => 'required',
            'cbDessinateur' => 'required'
            );
            // Validation des Champs
         $validator = Validator::make(Request::all(), $regles);
         // On retourne au formulaire s'il y a un problème
         if ($validator->fails()) {
               if ($id_manga > 0) {
                  return redirect('modifierManga/' . $id_manga)
                                 ->withErrors($validator)
                                 ->withInput();
               } else {
                  return redirect('ajouterManga/')
                                 ->withErrors($validator)
                                 ->withInput();
               }
         }
        $id_dessinateur = Request::input('cbDessinateur'); // Liste déroulante




         // id dans le champs caché
         $id_manga = Request::input('id_manga');
         // Récupérer des Valeurs Saisies
         $id_manga         = Request::input('id_manga');       //id dans champs caché
         $id_dessinateur   = Request::input('cbDessinateur');  //List déroulante
         $prix             = Request::input('prix'); 
         $id_scenariste    = Request::input('cbScenariste');   //List déroulante
         $titre            = Request::input('titre');
         $id_genre         = Request::input('cbGenre');        //List déroulante

      if (Request::hasFile('couverture')) {
            
            $image = Request::file('couverture');
            $couverture = $image -> getClientOriginalName();
            Request::file('couverture') -> move(base_path().'/public/images/', $couverture);
            
         } else {
            $couverture = Request::input('couvertureHidden');
         }
         if($id_manga > 0){
            $manga = Manga::find($id_manga);
            }else{
               $manga = new Manga();
            }
      //    // $manga = ::find($id_manga);
         $manga -> titre         = $titre;
         $manga -> couverture    = $couverture;
         $manga -> prix          = $prix;
         $manga -> id_dessinateur= $id_dessinateur;
         $manga -> id_scenariste = $id_scenariste;
         $manga -> id_genre      = $id_genre;
         $manga -> id_lecteur      = 1;

         $erreur="";
         try {
         $manga->save();
         }
         catch (Exception $ex) {
            $erreur = $ex->getMessage();
            Session::put('erreur',$erreur);
            if($id_manga > 0){
               return redirect('/modifierManga/'.$id_manga);
            } else {
               return redirect('/ajouterManga/');
            }
            
         }
          //On affiche la liste des Mangas
         return redirect('/listerMangas');
      }

         // ========== Suprimer Manga ==========

         public function deleteManga($id){
            $manga = Manga::find($id);
            try{
               $manga->delete();
            } catch (Exception $ex) {
               $erreur = $ex->getmessage();
               Session::put('erreur',$erreur);
               return redirect('/listerMangas');
            }finally{
               return redirect('/listerMangas');
            }
         }  
}
