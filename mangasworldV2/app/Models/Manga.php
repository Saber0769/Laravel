<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//class Manga
class Manga extends Model{
    use HasFactory;
    protected $table = 'manga';
    public $timestamps = false;
    protected $primaryKey = 'id_manga';
    protected $fillable = ['id_manga','id_dessinateur','id_scenariste', 'prix', 'titre', 'couverture', 'id_genre'];
    
    public function dessinateur(){
        return $this-> belongsTo ('App\Models\Dessinateur','id_dessinateur', 'id_dessinateur');
    }
    
    public function scenariste() {
        return $this-> belongsTo('App\Models\Scenariste','id_scenariste', 'id_scenariste');
    }
                
    public function genre(){
        return $this-> belongsTo('App\Models\Genre','id_genre', 'id_genre');
        
    }

} 
    //Class Dessinateur
//class Dessinateur extends Model
//{
//    protected $table = 'dessinateur';
//    public $timestamps = false;
//    protected $primaryKey = 'id_dessinateur';
//    protected $fillable = ['id_dessinateur','nom_dessinateur','prenom_dessinateur'];
//
//    public function mangas() {
//        return $this->his-> hasMany('App\Models\Manga','id_dessinateur', 'id_dessinateur');
//    }
//}
//
////class Scenariste 
//class Scenariste extends Model
//{
//    protected $table = 'scenariste';
//    public $timestamps = false;
//    protected $primaryKey = 'id_scenariste';
//    protected $fillable = ['id_scenariste','nom_scenariste','prenom_scenariste'];
//
//    public function scenariste() {
//        return $this->his-> hasMany('App\Models\Manga','id_scenariste', 'id_scenariste');
//    }
//}

